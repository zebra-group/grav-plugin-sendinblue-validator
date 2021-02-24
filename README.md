# SendInBlue Validator Plugin

**This plugin validates if an email is in contact list in SendinBlue or not**

The **SendInBlue Validator** Plugin is an extension for [Grav CMS](http://github.com/getgrav/grav).

## Installation

Installing the SendInBlue Validator plugin can be done in one of three ways: The GPM (Grav Package Manager) installation method lets you quickly install the plugin with a simple terminal command, the manual method lets you do so via a zip file, and the admin method lets you do so via the Admin Plugin.

### GPM Installation (Preferred)

To install the plugin via the [GPM](http://learn.getgrav.org/advanced/grav-gpm), through your system's terminal (also called the command line), navigate to the root of your Grav-installation, and enter:

    bin/gpm install sendinblue-validator

This will install the Headless Forms plugin into your `/user/plugins`-directory within Grav. Its files can be found under `/your/site/grav/user/plugins/sendinblue-validator`.

### Manual Installation

To install the plugin manually, download the zip-version of this repository and unzip it under `/your/site/grav/user/plugins`. Then rename the folder to `sendinblue-validator`. You can find these files on [GitHub](https://github.com/zebra-group/grav-plugin-sendinblue-validator) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/sendinblue-validator
	
> NOTE: This plugin is a modular component for Grav which may require other plugins to operate, please see its [blueprints.yaml-file on GitHub](https://github.com//grav-plugin-headless-forms/blob/master/blueprints.yaml).

### Admin Plugin

If you use the Admin Plugin, you can install the plugin directly by browsing the `Plugins`-menu and clicking on the `Add` button.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/sendinblue-validator/sendinblue-validator.yaml` to `user/config/plugins/sendinblue-validator.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
api_key: send-in-blue-api-key
```

Note that if you use the Admin Plugin, a file with your configuration named headless-forms.yaml will be saved in the `user/config/plugins/`-folder once the configuration is saved in the Admin.

## Usage

**Calling the Webhook http://your.site/mail-validation?mail=look.for@mailadress.com returns if the mail you are looking for is in the contact list or if not**



