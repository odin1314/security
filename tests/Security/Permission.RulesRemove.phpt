<?php

/**
 * Test: Nette\Security\Permission Ensure that basic rule removal works.
 */

use Nette\Security\Permission;
use Tester\Assert;


require __DIR__ . '/../bootstrap.php';


$acl = new Permission;
$acl->allow(NULL, NULL, ['privilege1', 'privilege2']);
Assert::false($acl->isAllowed());
Assert::true($acl->isAllowed(NULL, NULL, 'privilege1'));
Assert::true($acl->isAllowed(NULL, NULL, 'privilege2'));
$acl->removeAllow(NULL, NULL, 'privilege1');
Assert::false($acl->isAllowed(NULL, NULL, 'privilege1'));
Assert::true($acl->isAllowed(NULL, NULL, 'privilege2'));
