<?php

class SomeObject1 extends SomeObject implements ISomeObject {

	private string $handler = 'handle_object_1';

	public function getHandler(): string
	{
		return $this->handler;
	}
}

class SomeObject2 extends SomeObject implements ISomeObject {

	private string $handler = 'handle_object_2';

	public function getHandler(): string
	{
		return $this->handler;
	}
}

interface ISomeObject {
	public function getHandler(): string;
}

abstract class SomeObject {
	public function __construct(
		protected $data,
	)
	{
		// Do nothing.
	}
}

class SomeObjectsHandler {
	/**
	 * @param ISomeObject[] $objects
	 */
	public function __construct(
		private array $objects
	) { }

	public function handleObjects(): array {
		$handlers = [];
		foreach ($this->objects as $object) {
			$handlers[] = $object->getHandler();
		}

		return $handlers;
	}
}

$objects = [
	new SomeObject1(['data_object_1']),
	new SomeObject2(['data_object_2'])
];

$soh = new SomeObjectsHandler($objects);
$soh->handleObjects();