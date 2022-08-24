<?php

$config = [
	'storage' => 'DB',
];

class Concept {
	private $client;

	private const DEFAULT_STORAGE = 'File';

	public function __construct(
		private array $config
	) {
		$this->client = new \GuzzleHttp\Client();
	}

	public function getUserData() {
		$params = [
			'auth' => ['user', 'pass'],
			'token' => $this->getSecretKey()
		];

		$request = new \Request('GET', 'https://api.method', $params);
		$promise = $this->client->sendAsync($request)->then(function ($response) {
			$result = $response->getBody();
		});

		$promise->wait();
	}

	private function getSecretKey(): string {
		$storageType = $this->config['storage'] ?? self::DEFAULT_STORAGE;
		$storage = StorageFactory::Create($storageType);
		if ($storage->isSecretKeyExpired()) {
			// GetSecretKey and TTL from API
			$secretKey = 'SecretKey';
			$TTL = 'SecretKey';
			$storage->saveSecretKey($secretKey, $TTL);
		} else {
			$secretKey = $storage->getSecretKey();
		}

		return $secretKey;
	}
}

interface IStorageInterface {

	public function getSecretKey(): string;

	public function saveSecretKey(string $secretKey, int $TTL): bool;

	public function isSecretKeyExpired(): bool;
}

class StorageFactory {
	public static function Create($className): IStorageInterface {
		if (class_exists($className)) {
			return new $className();
		}
		throw new \InvalidArgumentException(sprintf('Class %s not exist.', $className));
	}
}

class File implements IStorageInterface {
	public function getSecretKey(): string {
		// GetSecretKey from storage.
		$secretKey = 'SecretKey';
		return $secretKey;
	}

	public function saveSecretKey(string $secretKey, int $TTL): bool {
		// SaveSecretKey and TTL from storage.
		$isSavedSecretKeyAndTTL = mt_rand(0, 1);

		return $isSavedSecretKeyAndTTL;
	}

	public function isSecretKeyExpired(): bool {
		$isSecretKeyAlive = mt_rand(0, 1);
		return $isSecretKeyAlive;
	}
}

class DB implements IStorageInterface {
	public function getSecretKey(): string {
		// GetSecretKey from storage.
		$secretKey = 'SecretKey';
		return $secretKey;
	}

	public function saveSecretKey(string $secretKey, int $TTL): bool {
		// SaveSecretKey and TTL from storage.
		$isSavedSecretKeyAndTTL = mt_rand(0, 1);

		return $isSavedSecretKeyAndTTL;
	}

	public function isSecretKeyExpired(): bool {
		$isSecretKeyAlive = mt_rand(0, 1);
		return $isSecretKeyAlive;
	}
}

class Redis implements IStorageInterface {
	public function getSecretKey(): string {
		// GetSecretKey from storage.
		$secretKey = 'SecretKey';
		return $secretKey;
	}

	public function saveSecretKey(string $secretKey, int $TTL): bool {
		// SaveSecretKey and TTL from storage.
		$isSavedSecretKeyAndTTL = mt_rand(0, 1);

		return $isSavedSecretKeyAndTTL;
	}

	public function isSecretKeyExpired(): bool {
		$isSecretKeyAlive = mt_rand(0, 1);
		return $isSecretKeyAlive;
	}
}

class Cloud implements IStorageInterface {
	public function getSecretKey(): string {
		// GetSecretKey from storage.
		$secretKey = 'SecretKey';
		return $secretKey;
	}

	public function saveSecretKey(string $secretKey, int $TTL): bool {
		// SaveSecretKey and TTL from storage.
		$isSavedSecretKeyAndTTL = mt_rand(0, 1);

		return $isSavedSecretKeyAndTTL;
	}

	public function isSecretKeyExpired(): bool {
		$isSecretKeyAlive = mt_rand(0, 1);
		return $isSecretKeyAlive;
	}
}
