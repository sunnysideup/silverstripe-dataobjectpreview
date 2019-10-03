2019-10-04 09:58

# running php upgrade upgrade see: https://github.com/silverstripe/silverstripe-upgrader
cd /var/www/upgrades/upgradeto4
php /var/www/upgrader/vendor/silverstripe/upgrader/bin/upgrade-code upgrade /var/www/upgrades/upgradeto4/dataobjectpreview  --root-dir=/var/www/upgrades/upgradeto4 --write -vvv --prompt
Array
(
    [0] => Running upgrades on "/var/www/upgrades/upgradeto4/dataobjectpreview"
    [1] => [2019-10-04 09:58:06] Applying RenameClasses to DataObjectPreviewInterface.php...
    [2] => [2019-10-04 09:58:06] Applying ClassToTraitRule to DataObjectPreviewInterface.php...
    [3] => [2019-10-04 09:58:06] Applying RenameClasses to DataObjectPreviewer.php...
    [4] => [2019-10-04 09:58:06] Applying ClassToTraitRule to DataObjectPreviewer.php...
    [5] => PHP Fatal error:  Uncaught TypeError: Argument 1 passed to SilverStripe\Upgrader\UpgradeRule\PHP\Visitor\ClassToTraitVisitor::getNodeName() must implement interface PhpParser\Node, null given, called in /var/www/upgrader/vendor/silverstripe/upgrader/src/UpgradeRule/PHP/Visitor/ClassToTraitVisitor.php on line 48 and defined in /var/www/upgrader/vendor/silverstripe/upgrader/src/UpgradeRule/PHP/Visitor/NodeMatchable.php:42
    [6] => Stack trace:
    [7] => #0 /var/www/upgrader/vendor/silverstripe/upgrader/src/UpgradeRule/PHP/Visitor/ClassToTraitVisitor.php(48): SilverStripe\Upgrader\UpgradeRule\PHP\Visitor\ClassToTraitVisitor->getNodeName(NULL)
    [8] => #1 /var/www/upgrader/vendor/nikic/php-parser/lib/PhpParser/NodeTraverser.php(159): SilverStripe\Upgrader\UpgradeRule\PHP\Visitor\ClassToTraitVisitor->enterNode(Object(PhpParser\Node\Stmt\Class_))
    [9] => #2 /var/www/upgrader/vendor/nikic/php-parser/lib/PhpParser/NodeTraverser.php(101): PhpParser\NodeTraverser->traverseArray(Array)
    [10] => #3 /var/www/upgrader/vendor/nikic/php-parser/lib/PhpParser/NodeTraverser.php(171): PhpPa in /var/www/upgrader/vendor/silverstripe/upgrader/src/UpgradeRule/PHP/Visitor/NodeMatchable.php on line 42
)
