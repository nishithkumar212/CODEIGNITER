import {
	AuthServiceConfig,
	FacebookLoginProvider,
	GoogleLoginProvider
} from "angular-6-social-login";
export function getAuthServiceConfigs() {
	let config = new AuthServiceConfig([
		{
			id: GoogleLoginProvider.PROVIDER_ID,
			provider: new GoogleLoginProvider("974074009028-kvngdco0v5hvh513i46a0v42fr9a8u53.apps.googleusercontent.com")
		},
		{
			id: FacebookLoginProvider.PROVIDER_ID,
			provider: new FacebookLoginProvider("2104686813156853")
		}
	]);
	return config;
}
