<?php

namespace Heyday\DataObjectPreview\Gridfield;

use DataObjectPreviewer;
use DataObjectPreviewInterface;
use GridField_ColumnProvider;
use GridField_HTMLProvider;
use Requirements;

/**
 * Class GridFieldDataObjectPreview
 */
class GridFieldDataObjectPreview implements GridField_ColumnProvider, GridField_HTMLProvider
{
    /**
     * @var DataObjectPreviewer
     */
    protected $previewer;

    /**
     * @param DataObjectPreviewer $previewer
     */
    public function __construct(DataObjectPreviewer $previewer)
    {
        $this->previewer = $previewer;
    }

    /**
     * Start GridField_ColumnProvider
     */

    /**
     * @param GridField $gridField
     * @param           $columns
     */
    public function augmentColumns($gridField, &$columns)
    {
        if (! in_array('Preview', $columns, true)) {
            array_unshift($columns, 'Preview');
        }
    }

    /**
     * @param  GridField $gridField
     * @return array
     */
    public function getColumnsHandled($gridField)
    {
        return ['Preview'];
    }

    /**
     * @param  GridField   $gridField
     * @param  DataObject  $record
     * @param  string      $columnName
     * @return bool|string
     */
    public function getColumnContent($gridField, $record, $columnName)
    {
        if ($record instanceof DataObjectPreviewInterface) {
            return $this->previewer->preview($record);
        }
        return false;
    }

    /**
     * @param  GridField  $gridField
     * @param  DataObject $record
     * @param  string     $columnName
     * @return array
     */
    public function getColumnAttributes($gridField, $record, $columnName)
    {
        return [
            'class' => 'col-' . $columnName . ' gridfield-preview',
        ];
    }

    /**
     * @param  GridField $gridField
     * @param  string    $columnName
     * @return array
     */
    public function getColumnMetadata($gridField, $columnName)
    {
        return ['title' => $columnName];
    }

    /**
     * End GridField_ColumnProvider
     */

    /**
     * Start GridField_HTMLProvider
     */
    public function getHTMLFragments($gridField)
    {
        Requirements::javascript(DATAOBJECTPREVIEW_DIR . '/js/DataObjectPreviewer.js');
        Requirements::css(DATAOBJECTPREVIEW_DIR . '/css/DataObjectPreviewer.css');
    }

    /**
     * End GridField_HTMLProvider
     */
}
