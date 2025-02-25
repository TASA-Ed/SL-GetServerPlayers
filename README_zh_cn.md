# SL-GetServerPlayers



[English](README.md) | 简体中文

# 关于

用于获取SCP：秘密实验室游戏服务器上的玩家人数。

此 PHP 代码基于 api.scpslgame.com，安装时只需将代码文件夹中的文件放入服务器即可，请求应包括账户 ID（id）和 API 密钥（key）。

如果您在同一账户id上有多个服务器，则需要指定服务器ID（serverid，值得注意的是此ServerID只代表JSON列表ID），从0开始，如果ID无效，则会打印全部服务器的人数，使用\n分割。

例如，您有两个服务器，一个端口是7777另一个端口是7778，那么7777的服务器ID则为0，7778的服务器ID为1（后续会优化）。

# 要求

- PHP 8.3+
- PHP 扩展 curl.
