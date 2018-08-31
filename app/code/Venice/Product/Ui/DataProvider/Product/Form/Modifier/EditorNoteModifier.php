<?php

namespace Venice\Product\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Model\Locator\LocatorInterface;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Venice\Product\Api\NoteRepositoryInterface;
use Magento\Framework\Stdlib\ArrayManager;
use Magento\Ui\Component\Form\Fieldset;
use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Ui\Component\Form\Element\DataType\Boolean;
use Magento\Ui\Component\Form\Element\Textarea;
use Magento\Ui\Component\Form\Element\Input;
use Magento\Ui\Component\Form\Element\Checkbox;
use Magento\Ui\Component\Form\Field;

class EditorNoteModifier extends AbstractModifier
{
    // Components indexes
    const NOTE_FIELD_INDEX = 'editor_note_field';

    // Fields names
    const NOTE_DESC_FIELD_TEXT = 'editor_note_desc_text';
    const NOTE_TITLE_FIELD_TEXT = 'editor_note_title_text';
    const IS_NOTE_DISPLAY = 'is_editor_note_display';

    /**
     * @var \Magento\Catalog\Model\Locator\LocatorInterface
     */
    protected $locator;

    /**
     * @var ArrayManager
     */
    protected $arrayManager;

    /**
     * @var array
     */
    protected $meta = [];

    /**
     * @var NoteRepositoryInterface
     */
    protected $noteRepository;

    /**
     * @var Note
     */
    protected $note;

    /**
     * @param LocatorInterface $locator
     * @param ArrayManager $arrayManager
     * @param NoteRepositoryInterface $noteRepository
     */
    public function __construct(
        LocatorInterface $locator,
        ArrayManager $arrayManager,
        NoteRepositoryInterface $noteRepository
    ) {
        $this->locator = $locator;
        $this->arrayManager = $arrayManager;
        $this->noteRepository = $noteRepository;

        $productId = $this->locator->getProduct()->getId();
        $this->note = $this->noteRepository->getByProductId($productId);
    }


    /**
     * Data modifier
     *
     * @param array $data
     * @return array
     */
    public function modifyData(array $data)
    {
        return $data;
    }

    /**
     * Meta-data modifier: adds ours fieldset
     *
     * @param array $meta
     * @return array
     */
    public function modifyMeta(array $meta)
    {
        $this->meta = $meta;
        $this->addCustomFieldset();

        return $this->meta;
    }

    /**
     * Merge existing meta-data with our meta-data (do not overwrite it!)
     *
     * @return void
     */
    protected function addCustomFieldset()
    {
        $this->meta = array_merge_recursive(
            $this->meta,
            [
                static::NOTE_FIELD_INDEX => $this->getFieldsetConfig(),
            ]
        );
    }


    /**
     * Declare ours fieldset config
     *
     * @return array
     */
    protected function getFieldsetConfig()
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Editor Note'),
                        'componentType' => Fieldset::NAME,
                        'dataScope' => static::DATA_SCOPE_PRODUCT, // save data in the product data
                        'provider' => static::DATA_SCOPE_PRODUCT . '_data_source',
                        'ns' => static::FORM_NAME,
                        'collapsible' => true,
                        'sortOrder' => 50,
                        'opened' => false,
                    ],
                ],
            ],
            'children' => [
                static::NOTE_TITLE_FIELD_TEXT => $this->getTitleFieldConfig(10),
                static::NOTE_DESC_FIELD_TEXT => $this->getDescTextFieldConfig(20),
                static::IS_NOTE_DISPLAY => $this->getIsDisplayFieldConfig(30),
            ],
        ];
    }

    /**
     * Text field config
     *
     * @param $sortOrder
     * @return array
     */
    protected function getDescTextFieldConfig($sortOrder)
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Note Description'),
                        'formElement' => Field::NAME,
                        'componentType' => Textarea::NAME,
                        'dataScope' => static::NOTE_DESC_FIELD_TEXT,
                        'dataType' => Text::NAME,
                        'sortOrder' => $sortOrder,
                        'value' => $this->note->getDescription(),
                    ],
                ],
            ],
        ];
    }

    /**
     * Text field config
     *
     * @param $sortOrder
     * @return array
     */
    protected function getTitleFieldConfig($sortOrder)
    {
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Note Title'),
                        'formElement' => Field::NAME,
                        'componentType' => Input::NAME,
                        'dataScope' => static::NOTE_TITLE_FIELD_TEXT,
                        'dataType' => Text::NAME,
                        'sortOrder' => $sortOrder,
                        'value' => $this->note->getTitle(),
                    ],
                ],
            ],
        ];
    }

    protected function getIsDisplayFieldConfig($sortOrder)
    {
        $status = (is_null($this->note->getStatus()) ? '1':$this->note->getStatus());
        return [
            'arguments' => [
                'data' => [
                    'config' => [
                        'label' => __('Display'),
                        'formElement' => Field::NAME,
                        'componentType' => Checkbox::NAME,
                        'dataScope' => static::IS_NOTE_DISPLAY,
                        'dataType' => Boolean::NAME,
                        'sortOrder' => $sortOrder,
                        'value' => $status,
                        'valueMap' => [
                            'true' => '1',
                            'false' => '0'
                        ],
                    ],
                ],
            ],
        ];
    }
}
