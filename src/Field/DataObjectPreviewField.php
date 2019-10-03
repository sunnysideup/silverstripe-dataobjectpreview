<?php

namespace Heyday\DataObjectPreview\Field;





use Heyday\DataObjectPreview\DataObjectPreviewInterface;
use Heyday\DataObjectPreview\DataObjectPreviewer;
use SilverStripe\View\Requirements;
use SilverStripe\Forms\DatalessField;


/**
 * Class DataObjectPreviewField
 */
class DataObjectPreviewField extends DatalessField
{
    /**
     * @var DataObjectPreviewInterface
     */
    protected $record;

    /**
     * @var DataObjectPreviewer
     */
    protected $previewer;

    /**
     * @param The                        $name
     * @param DataObjectPreviewInterface $record
     * @param DataObjectPreviewer        $previewer
     */
    public function __construct(
        $name,
        DataObjectPreviewInterface $record,
        DataObjectPreviewer $previewer
    ) {
        $this->record = $record;
        $this->previewer = $previewer;
        parent::__construct(
            $name
        );
    }

    /**
     * @param  array  $properties
     * @return string
     */
    public function Field($properties = [])
    {
        Requirements::javascript(DATAOBJECTPREVIEW_DIR . '/js/DataObjectPreviewer.js');
        return $this->previewer->preview($this->record);
    }
}
