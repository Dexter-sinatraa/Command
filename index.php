<?php
// Інтерфейс команди
interface Command {
    public function execute();
}

// Конкретна команда
class LightOnCommand implements Command {
    private $light;

    public function __construct(Light $light) {
        $this->light = $light;
    }

    public function execute() {
        $this->light->turnOn();
    }
}

// Ще одна конкретна команда
class LightOffCommand implements Command {
    private $light;

    public function __construct(Light $light) {
        $this->light = $light;
    }

    public function execute() {
        $this->light->turnOff();
    }
}

// Отримувач (Receiver) - об'єкт, який буде управляти командами
class Light {
    public function turnOn() {
        echo "Light is ON.<br>";
    }

    public function turnOff() {
        echo "Light is OFF.<br>";
    }
}

// Викликач команди
class RemoteControl {
    private $command;

    public function setCommand(Command $command) {
        $this->command = $command;
    }

    public function pressButton() {
        $this->command->execute();
    }
}

// Використання паттерна Команда
$light = new Light();
$lightOnCommand = new LightOnCommand($light);
$lightOffCommand = new LightOffCommand($light);

$remoteControl = new RemoteControl();

$remoteControl->setCommand($lightOnCommand);
$remoteControl->pressButton();  // Light is ON.

$remoteControl->setCommand($lightOffCommand);
$remoteControl->pressButton();  // Light is OFF.
