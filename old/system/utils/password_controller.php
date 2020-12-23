<?php

function Hash512($inPass)
{
    return hash('sha512', $inPass);
}
function HashPass($inPass)
{
    return password_hash(Hash512($inPass), PASSWORD_DEFAULT);
}
function VerifyPass($entry, $origin)
{
    return password_verify(HashPass($inPass), $origin);
}