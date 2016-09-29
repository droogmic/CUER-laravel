# CUER Laravel
Based on the [Laravel PHP Framework](https://github.com/laravel/laravel)

## Status
| develop | master |  stable |
|---|---|---|
| [![Build Status](https://travis-ci.org/droogmic/CUER-laravel.svg?branch=develop)](https://travis-ci.org/droogmic/CUER-laravel) | [![Build Status](https://travis-ci.org/droogmic/CUER-laravel.svg?branch=master)](https://travis-ci.org/droogmic/CUER-laravel) | [![Build Status](https://travis-ci.org/droogmic/CUER-laravel.svg?branch=stable)](https://travis-ci.org/droogmic/CUER-laravel) |
##LINUX INSTRUCTIONS:
## Running with homestead
+ Follow the guide here: <https://laravel.com/docs/5.2/homestead>
+ Copy `.env.homestead` to `.env`
+ Run the following:
```
$ vagrant up
$ vagrant ssh
$ cd CUER
$ composer install
$ php artisan migrate
$ php artisan db:seed
```

##WINDOWS INSTRUCTIONS (a bit more detailed than the linux ones, so this may be helpful for linux users too)
##Running with homestead

+Install VirtualBox 5.x : https://www.virtualbox.org/wiki/Downloads
+Install Vagrant: https://www.vagrantup.com/downloads.html
+Install cygwin: https://cygwin.com/install.html
+Change home directory for cygwin to your user (probably not strictly necessary, but makes things a lot less confusing, and will keep consistency with the rest of the instructions here): http://stackoverflow.com/questions/1494658/how-can-i-change-my-cygwin-home-folder-after-installation
+Check that hardware virtualisation is enabled: http://www.howtogeek.com/213795/how-to-enable-intel-vt-x-in-your-computers-bios-or-uefi-firmware/
+Download putty and puttygen: http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html
+Now open a cygwin terminal, and enter the following command:

$vagrant box add laravel/homestead

+Download and install git if you haven't already, and then clone this repo. There's plenty of help documentation online/you can ask one of us if you struggle with this. 

We now need to edit the ~/.homestead/Homestead.yaml file so that it maps the github code you just cloned into the correct folders in the virtualbox. 

+In the 'folders' section, change the 'map' path to match where you cloned the CUER-laravel repo (e.g. - map: ~/CUER-laravel)
+In the 'folders' section, change the 'to' path to '/home/vagrant/CUER'
+In the 'sites' section, change the 'map' to 'homestead.app'
+In the 'sites' section, change the 'to' to '/home/vagrant/CUER/public'
+Leave everything else in the file alone

Now go back to the cygwin terminal and navigate to the same directory in which you carried out the 'vagrant box add laravel/homestead' command earlier
We need to create a directory to store SSH keys and put some in there.

$mkdir .ssh
+Now copy 'insecure_private_key' from ~/.vagrant.d into the .ssh folder you just made, and rename it to 'id_rsa' there
+Run puttygen
+Click Load, and make sure 'All files' is selected
+Load id_rsa
+Press generate and follow instructions
+Press 'Save public key' and then save it to .ssh as id_rsa.pub
+Now press save private key, and press 'yes' when it asks to save without a passphrase
+Save it as 'vagrant_private_key' in the ~/.ssh folder (should have a .ppk extension)

Almost there...
Now in cygwin, navigate back to Homestead, and run:

$vagrant up 
This command takes quite a while (several minutes) especially the first time you run it
Now the vagrant virtual machine is running, we need to ssh into it to communicate with it

+Run putty

+Use host 127.0.0.1
+Use port 2222 instead of 22
+Use the .ppk key in your PuTTY session - configured in Connection > SSH > Auth > Private key file
+Save the session for convenience
+Press 'Open'
+The username is 'vagrant'
+Hopefully it should accept the private key generated earlier. If not, and it asks for a password, don't worry - the password is also 'vagrant'

Now, in the putty ssh terminal, run the following commands:

$ cd CUER
$ composer install
$ php artisan migrate
$ php artisan db:seed

And we're there! In your web browser go to '192.168.10.10', and the webpage should load.


---------------------------------

## [Laravel PHP Framework](https://laravel.com/)
