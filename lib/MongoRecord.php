<?php

interface MongoRecord
{
	public static function setFindTimeout($timeout);
	public static function find(array $query);
	public static function findOne(array $query);
}

