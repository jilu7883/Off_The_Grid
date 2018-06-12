//Setup AP + STA Mode

//1. connect to your VoCore through USB2TTL.

//2. run command in console(UART console).

//3. setup network to enable dhcp(get ip from your hotspot).

uci delete network.wwan

uci set network.wwan=interface

uci set network.wwan.proto=dhcp

uci commit

//4. setup firewall to enable access to internet through your hotspot.

uci del_list firewall.@zone[1].network=wwan

uci add_list firewall.@zone[1].network=wwan

uci set firewall.@zone[1].input=ACCEPT

uci set firewall.@zone[1].output=ACCEPT

uci set firewall.@zone[1].forward=ACCEPT

uci set firewall.@zone[1].masq=1

uci set firewall.@zone[1].mtu_fix=1

uci commit

//5. setup wireless to enable ap+sta mode.

uci set wireless.sta.ssid="[TARGET AP SSID]"

uci set wireless.sta.key="[TARGET AP PASSWORD]"

uci set wireless.sta.network=wwan

uci set wireless.sta.disabled=0

uci commit

//note:replace [TARGET AP SSID] to the target ap ssid you want to connect to, [TARGET AP PASSWORD] is its password.

//6. restart your network, it will work.

/etc/init.d/network restart

//7.(option) once ap+sta is totally up, disable it in config, so if next time your target ap is missing, you still able to connect to VoCore2.

uci set wireless.sta.disabled=0

uci commit

/etc/init.d/network restart

sleep 10

uci set wireless.sta.disabled=1

uci commit

//note: better copy the three lines to /etc/rc.local