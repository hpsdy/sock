<?php
function IsBigEndian()
{
    $bin = pack("L", 0x12345678);
	var_dump($bin);
    $hex = bin2hex($bin);
	var_dump($hex);
    if (ord(pack("H2", $hex)) === 0x78)
    {
        return FALSE;
    }
 
    return TRUE;
}
 
if (IsBigEndian())
{
    echo "大端序";
}
else
{
    echo "小端序";
}
 
echo "\n";
