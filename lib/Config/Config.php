<?php

declare(strict_types=1);

namespace OCA\fairmeeting\Config;

use OCA\fairmeeting\AppInfo\Application;
use OCP\IConfig;

class Config {
	public const KEY_fairmeeting_SERVER_URL = 'fairmeeting_server_url';
	public const KEY_JWT_SECRET = 'jwt_secret';
	public const KEY_JWT_APP_ID = 'jwt_app_id';
	public const KEY_JWT_AUDIENCE = 'jwt_audience';
	public const KEY_JWT_ISSUER = 'jwt_issuer';
	public const KEY_HELP_LINK = 'help_link';
	public const KEY_DISPLAY_JOIN_USING_THE_fairmeeting_APP = 'display_join_using_the_fairmeeting_app';
	public const KEY_ALL_SHARING_INVITES = 'display_all_sharing_invites';

	public const BOOL_TRUE = '1';
	public const BOOL_FALSE = '0';

	/**
	 * @var IConfig
	 */
	private $config;

	public function __construct(IConfig $config) {
		$this->config = $config;
	}

	public function fairmeetingServerUrl(): ?string {
		return $this->readString(self::KEY_fairmeeting_SERVER_URL);
	}

	public function updatefairmeetingServerUrl(string $serverUrl): void {
		$this->config->setAppValue(Application::APP_ID, self::KEY_fairmeeting_SERVER_URL, $serverUrl);
	}

	public function jwtSecret(): ?string {
		return $this->readString(self::KEY_JWT_SECRET);
	}

	public function jwtAppId(): ?string {
		return $this->readString(self::KEY_JWT_APP_ID);
	}

	public function jwtAudience(): ?string {
		$jwtAudience = $this->readString(self::KEY_JWT_AUDIENCE);
		return empty($jwtAudience) ? $this->jwtAppId() : $jwtAudience;
	}

	public function jwtIssuer(): ?string {
		$jwtIssuer = $this->readString(self::KEY_JWT_ISSUER);
		return empty($jwtIssuer) ? $this->jwtAppId() : $jwtIssuer;
	}

	public function helpLink(): ?string {
		return $this->readString(self::KEY_HELP_LINK);
	}

	public function displayJoinUsingThefairmeetingApp(): bool {
		// @phpstan-ignore-next-line
		return $this->readBool(self::KEY_DISPLAY_JOIN_USING_THE_fairmeeting_APP, true);
	}

	public function displayAllSharingInvites(): bool {
		// @phpstan-ignore-next-line
		return $this->readBool(self::KEY_ALL_SHARING_INVITES, true);
	}

	private function readBool(string $key, ?bool $default = null): ?bool {
		$value = $this->config->getAppValue(
			Application::APP_ID,
			$key,
			''
		);

		return $value === '' ? $default : $value === self::BOOL_TRUE;
	}

	private function readString(string $key): ?string {
		$value = $this->config->getAppValue(
			Application::APP_ID,
			$key,
			''
		);

		return $value === '' ? null : $value;
	}
}
