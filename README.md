# SL-GetServerPlayers



English | [简体中文](README_zh_cn.md)

# About

Used to get the number of players on the SCP: Secret Laboratory game server.

This PHP code is based on api.scpslgame.com, just drop the files from the code folder into your server when installing, the request should include the Account ID (id) and API key (key).

If you have more than one server on the same account id, you need to specify the server ID (serverid, it is worth noting that this ServerID only represents the JSON list ID), starting from 0. If the ID is invalid, the number of people on all servers will be printed, split by \n.

For example, you have two servers, one port is 7777 and the other port is 7778, then the server ID of 7777 will be 0 and the server ID of 7778 will be 1 (will be optimized later).

# Requirements

- PHP 8.3+
- PHP extension curl.
