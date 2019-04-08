import {
	AuthServiceConfig,
	FacebookLoginProvider,
	GoogleLoginProvider
} from "angular-6-social-login";

export function getAuthServiceConfigs() {
	let config = new AuthServiceConfig([
		{
			id: FacebookLoginProvider.PROVIDER_ID,
			provider: new FacebookLoginProvider('974074009028-kb5hfo3rrdupn1gs0gelp9vsugltp127.apps.googleusercontent.com ')
		}
	]);
	return config;
}
