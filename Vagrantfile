# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|

  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://vagrantcloud.com/search.
  config.vm.box = "ubuntu/focal64"

  # Disable automatic box update checking. If you disable this, then
  # boxes will only be checked for updates when the user runs
  # `vagrant box outdated`. This is not recommended.
  # config.vm.box_check_update = false
  config.vm.define "webserver" do |webserver|
    webserver.vm.hostname = "webserver"
  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  # NOTE: This will enable public access to the opened port
  # config.vm.network "forwarded_port", guest: 80, host: 8080

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine and only allow access
  # via 127.0.0.1 to disable public access
  config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1", auto_correct: true

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  # config.vm.network "private_network", ip: "192.168.33.10"

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  # config.vm.network "public_network"
  webserver.vm.network "private_network", ip: "192.168.56.11"
  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  # config.vm.synced_folder "../data", "/vagrant_data"
  config.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

  webserver.vm.provision "shell", path: "build-webserver-vm.sh"
end

config.vm.define "adminserver" do |adminserver|
  # These are options specific to the webserver VM
  adminserver.vm.hostname = "adminserver"
  
  adminserver.vm.network "forwarded_port", guest: 80, host: 8081, host_ip: "127.0.0.1"
  
  
  adminserver.vm.network "private_network", ip: "192.168.2.13"

  
  adminserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

  adminserver.vm.provision "shell", path: "build-adminserver-vm.sh"

end

config.vm.define "dbserver" do |dbserver|
  dbserver.vm.hostname = "dbserver"
  # config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1", auto_correct: true
  dbserver.vm.network "private_network", ip: "192.168.56.12"
  dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
  
  dbserver.vm.provision "shell", path: "build-dbserver-vm.sh"
end

# config.vm.define "adminserver" do |adminserver|
#   adminserver.vm.hostname = "adminserver"
#   adminserver.vm.network "private_network", ip: "192.168.56.13"
#   adminserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
#   adminserver.vm.provision "shell", path: "build-adminserver-vm.sh"
# end

end



