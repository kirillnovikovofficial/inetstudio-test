<?php

class XMLHttpService extends XMLHTTPRequestService implements XMLHTTPRequestServiceInterface {
}

class XMLHTTPRequestService {
	public function request(string $url, string $queryType, array $options = []) {
		//Do nothing.
	}
}

interface XMLHTTPRequestServiceInterface {
	public function request(string $url, string $queryType, array $options = []);
}

class Http {

	public function __construct(
		private XMLHTTPRequestServiceInterface $service
	) {}

	public function get(string $url, array $options) {
		$this->service->request($url, 'GET', $options);
	}

	public function post(string $url) {
		$this->service->request($url, 'GET');
	}
}