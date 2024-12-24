<?php

declare(strict_types=1);

use App\Emulator\Core;
use App\Emulator\Input\Devices\Keyboard;
use App\Emulator\Input\Devices\NullDevice;
use App\Emulator\Input\Enums\MagicKeypress;
use App\Emulator\Input\Input;
use App\Emulator\Memory\Memory;
use App\Exceptions\Input\InvalidInputDeviceException;
use Illuminate\Support\Facades\Config;
use Mockery\MockInterface;

beforeEach(function (): void {
    $this->core = $this->partialMock(Core::class);
    $this->core->init(excluding: ['config', 'cartridge', 'input', 'lcd']);
    $this->app->bind(Core::class, fn(): Core => $this->core);

    Config::set('emulator.input_device');
});

it('toggles the bit correctly when a key is pressed and then released', function (): void {
    $this->app->bind(Memory::class, fn(): Memory => $this->mock(Memory::class, function (MockInterface $mock): void {
        $mock->expects('updateJoypadRegister')->once()->withArgs([0xFE])->andReturnNull();
        $mock->expects('updateJoypadRegister')->once()->withArgs([0xFF])->andReturnNull();
    }));

    // Replace binds for this test:
    $this->core = $this->partialMock(Core::class);
    $this->core->init(excluding: ['config', 'cartridge', 'input', 'lcd']);
    $this->app->bind(Core::class, fn(): Core => $this->core);

    Config::set('emulator.input_device', 'keyboard');

    $this->app->bind(
        Keyboard::class,
        fn(): Keyboard => $this->mock(Keyboard::class, function (MockInterface $mock): void {
            $mock->allows('check')->never();
        }),
    );

    $input = new Input($this->core);
    $input->handleEvent(0, true);  // Clear bit 0, inputState = 0xFE
    $input->handleEvent(0, false); // Set bit 0, inputState = 0xFF

    expect($input->getInputState())->toBe(0xFF);
});

it('can check for new input using a keyboard device', function (): void {
    Config::set('emulator.input_device', 'keyboard');

    $this->app->bind(
        Keyboard::class,
        fn(): Keyboard => $this->mock(Keyboard::class, function (MockInterface $mock): void {
            $mock->allows('check')->once()->withNoArgs()->andReturnNull();
        }),
    );

    $input = new Input($this->core);
    $input->check();

    expect($input)
        ->getInput()->toBeInstanceOf(Keyboard::class)
        ->getEventListener()->toBeNull();
});

it('can check for new input using a non-keyboard device', function (): void {
    Config::set('emulator.input_device', 'null');

    $this->app->bind(
        NullDevice::class,
        fn(): NullDevice => $this->mock(NullDevice::class, function (MockInterface $mock): void {
            $mock->allows('check')->once()->withNoArgs()->andReturnNull();
        }),
    );

    // With a non-keyboard device set, the event listener should be a keyboard and should also be listening.
    $this->app->bind(
        Keyboard::class,
        fn(): Keyboard => $this->mock(Keyboard::class, function (MockInterface $mock): void {
            $mock->allows('check')->once()->withNoArgs()->andReturnNull();
        }),
    );

    $input = new Input($this->core);
    $input->check();

    expect($input)
        ->getInput()->toBeInstanceOf(NullDevice::class)
        ->getEventListener()->toBeInstanceOf(Keyboard::class);
});

it('can handle a magic input event', function (MagicKeypress $keypress): void {
    $this->core = $this->mock(Core::class, function (MockInterface $mock) use ($keypress): void {
        if ($keypress === MagicKeypress::DUMP_STATE) {
            $mock->expects('dumpState')->once()->withNoArgs()->andReturnNull();
        }

        if ($keypress === MagicKeypress::TOGGLE_MENU) {
            $mock->expects('toggleMenu')->once()->withNoArgs()->andReturnNull();
        }
    });
    $this->app->bind(Core::class, fn(): Core => $this->core);

    Config::set('emulator.input_device', 'keyboard');
    $input = new Input($this->core);

    $input->handleSpecialEvent($keypress);
})->with(MagicKeypress::cases());

it('can throw an exception if an unsupported device is set', function (): void {
    Config::set('emulator.input_device', 'unsupported device');
    new Input($this->core);
})->throws(InvalidInputDeviceException::class);

it('can return the current input device', function (): void {
    Config::set('emulator.input_device', 'null');
    $input = new Input($this->core);

    expect($input->getInput())->toBeInstanceOf(NullDevice::class);
});

it('can return the current event listener', function (): void {
    Config::set('emulator.input_device', 'null');
    $input = new Input($this->core);

    expect($input->getEventListener())->toBeInstanceOf(Keyboard::class);
});

it('can return the current input event state', function (): void {
    Config::set('emulator.input_device', 'null');
    $input = new Input($this->core);

    expect($input->getInputState())->toBe(0xFF);
});
