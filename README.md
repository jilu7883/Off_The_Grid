
# Project Description: Gridless Wireless Network

# Team name: Off the Grid 

# Team members:
Ian Schneier
Linda Palacios
Weikang Zhang
Xucheng You
Jingwen Luo
Alec Motazedi


# Project Sponsor:
 Prof. Alan Mickelson 


# Introduction
The Gridless Wireless Network (G.W.N) provides open network access to civilians in areas that have been recently affected by a natural disaster or another calamity. Network access in these locations are disabled due to power grid failure or destruction of the network infrastructure itself. Our solution provides a means of deploying a digital communication network that will connect victims with rescuers, saving more lives as well as improving coordination during recovering operations.
The system transmits a wireless fidelity (Wi-Fi) network in the surrounding area where the G.W.Ns are deployed. This is accomplished by using a data connection from a functional network and transmitting it through multiple G.W.Ns to the designated location. The G.W.N located at the data center or internet connection source transmits the signal via a long range antenna to another G.W.N of the device takes a data connection and relays the signal to another G.W.N or retransmit the signal in an omnidirectional coverage area pattern that individuals may connect wirelessly to in order to access the internet. The various configurations allow for a robust decentralized network to be generated by using just G.W.Ns and a network connection.
This manual will guide you on how to use and configure these devices to create the long range wireless network offered by these devices.


*G.W.N refers to device that is the Gridless Wireless Network
# Configuration Setup
	Each G.W.N comes with a microSD card. This card contains the network information needed to setup the network nodes. Ensure that the device is powered off.
Insert the SD card into your SD card reader slot on your PC. The card should not require reformatting
Open the sd card directory and open the file called “networks”
For each line write the network information enclosed in quotation marks in this format:
 “[network ssid/name]” “[network security protocol]” “[password]”
Each line denotes a specific Wi-Fi network that the G.W.N will attempt to connect to
Save the file on the sd card.
(Re)insert the card into microSD card slot on the G.W.N, the device will then attempt to connect to the
Ideally each network should use WPA2 encryption
Deployment Setup
To setup the G.W.N do the following steps:
Press the PWR button (it is marked with the  symbol). The corresponding LED (located directly above the PWR button) should emit a green light to signify that the device is powered on.
Press the COM button to setup the device to transmit the network. The G.W.N will automatically operate in the the mode selected on the MODE switch and configure itself to transmit the network.

The setup is successful when the COM light is green, signifying that the network is transmitting and connected to the internet. Additionally, the PWR LED should emit a color that corresponds to the amount of charge that the battery has (Green for 66+, yellow for 66-33, orange for 32-15, red for 14-5, blinking red for less than 5).
Modes of Operation
The G.W.N has different modes of operations which determine which of the three antennas the device will use depending on certain circumstances or what option is selected on the MODE switch. The different modes are listed in the table below.
 


# Troubleshooting 
The setup LED will glow orange if it is not connected to a network or red if an internal error or problem occurs. To fix this try one of the following options:
Press the setup button again to restart the device which will attempt to reconnect to a network.
Turn off the device by pressing the PWR button, wait for at least one minute, then press the PWR button again to turn it back on then press the COM again to deploy to the network. 
Customization
The G.W.N operates on the Ubuntu Operating 

# Disclaimer
The 72 hours duration assumes that the battery has a full or nearly full charge so the actual battery life will vary depending on battery charge at deployment.
While the device can generate network signal with a 1 Km or 5 Km range (depending on antenna used), the actual range will possibly be reduced due to weather, terrain, and other conditions of the region it is deployed in.
