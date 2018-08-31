<?php

namespace Venice\Form\Setup;


use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Venice\Form\Api\FormFormatRepositoryInterface;

class InstallData implements InstallDataInterface {

    protected $formFormatRepository;

    public function __construct(
        FormFormatRepositoryInterface $formFormatRepository
    )
    {
        $this->formFormatRepository = $formFormatRepository;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $data = [
            [
                'name' => 'trade-in',
                'email' => 'tradein@watchshopping.com',
                'status' => '1',
                'stored_id' =>'1',
                'detail' => '[{"title":"Your Information","fields":[{"label":"First name","type":"text","name":"first_name","id":"first-name","placeholder":"First name"},{"label":"Last name","type":"text","name":"last_name","id":"last-name","placeholder":"Last name"},{"label":"Email","type":"email","name":"email","id":"email","patterns":"^(([^<>()\\\\[\\\\]\\\\\\\\.,;:\\\\s@\\"]+(\\\\.[^<>()\\\\[\\\\]\\\\\\\\.,;:\\\\s@\\"]+)*)|(\\".+\\"))@((\\\\[[0-9]{1,3}\\\\.[0-9]{1,3}\\\\.[0-9]{1,3}\\\\.[0-9]{1,3}\\\\])|(([a-zA-Z\\\\-0-9]+\\\\.)+[a-zA-Z]{2,}))$","errorMessage":"Please enter a valid email address (Ex: johndoe@domain.com). ","placeholder":"Email"},{"label":"Phone Number","type":"text","name":"phone","id":"phone","patterns":"\\\\(?([0-9]{2,})\\\\)?([ .-]?)([0-9]{3,})([ .-]?)([0-9]{4})","errorMessage":"Please enter a valid phone number (Ex: \'855 111-1111\'or \'(855) 111 1111\' ). ","placeholder":"Phone Number"}]},{"title":"Watch Information","fields":[{"label":"Watch Brand","type":"select","name":"watch_brand","id":"watch-brand","option":[{"value":"","name":"Watch Brand","isDefault":"true"},{"value":"Rolex","name":"Rolex","isDefault":"false"},{"value":"Breitling","name":"Breitling","isDefault":"false"},{"value":"Cartier","name":"Cartier","isDefault":"false"},{"value":"Hublot","name":"Hublot","isDefault":"false"},{"value":"Omega","name":"Omega","isDefault":"false"},{"value":"IWC","name":"IWC","isDefault":"false"},{"value":"Patek Philippe","name":"Patek Philippe","isDefault":"false"}]},{"label":"Model / Series Name","type":"text","name":"model","id":"model","placeholder":"Model / Series Name"},{"label":"Model Number","type":"text","name":"model_number","id":"model_number","placeholder":"Model Number"},{"label":"Are original watch box and/or papers available?","type":"select","name":"box_or_papers","id":"box-or-papers","option":[{"value":"","name":"Are original watch box and/or papers available?","isDefault":"true"},{"value":"Box Only","name":"Box Only","isDefault":"false"},{"value":"Papers Only","name":"Papers Only","isDefault":"false"},{"value":"Box and Papers","name":"Box and Papers","isDefault":"false"},{"value":"Neither","name":"Neither","isDefault":"false"}]},{"label":"Purchase Date","type":"date","name":"purchase_date","id":"purchase-date","placeholder":"Purchase Date"},{"label":"Purchased From","type":"text","name":"purchased_from","id":"purchased-from","placeholder":"Purchased From"}]},{"title":"Tell us about the condition of your watch","fields":[{"label":"condition","type":"textarea","name":"condition","id":"condition","required":"not required","placeholder":"Please describe here the condition of your watch (2000 characters maximum)"},{"label":"dropzone","type":"dropzone","name":"dropzone-display","id":"dropzone-display","required":"not required","placeholder":"Please describe here the condition of your watch (2000 characters maximum)"}]},{"title":"Trade-in Information","fields":[{"label":"I want to apply all credit towards the purchase of (link/model no):","type":"text","name":"trade_in_information","id":"trade-in-information","placeholder":"I want to apply all credit towards the purchase of (link/model no):"},{"label":"How did you hear about our Trade-In program?","type":"text","name":"heard_from","id":"heard-from","required":"not required","placeholder":"How did you hear about our Trade-In program?"}]}]',
            ],
            [
                'name' => 'sell-us-your-rolex',
                'email' => 'tradein@watchshopping.com',
                'status' => '1',
                'stored_id' =>'1',
                'detail' => '[{"title":"Your Information","fields":[{"label":"First name","type":"text","name":"first_name","id":"first-name","placeholder":"First name"},{"label":"Last name","type":"text","name":"last_name","id":"last-name","placeholder":"Last name"},{"label":"Email","type":"email","name":"email","id":"email","patterns":"^(([^<>()\\\\[\\\\]\\\\\\\\.,;:\\\\s@\\"]+(\\\\.[^<>()\\\\[\\\\]\\\\\\\\.,;:\\\\s@\\"]+)*)|(\\".+\\"))@((\\\\[[0-9]{1,3}\\\\.[0-9]{1,3}\\\\.[0-9]{1,3}\\\\.[0-9]{1,3}\\\\])|(([a-zA-Z\\\\-0-9]+\\\\.)+[a-zA-Z]{2,}))$","errorMessage":"Please enter a valid email address (Ex: johndoe@domain.com). ","placeholder":"Email"},{"label":"Phone Number","type":"text","name":"phone","id":"phone","patterns":"\\\\(?([0-9]{2,})\\\\)?([ .-]?)([0-9]{3,})([ .-]?)([0-9]{4})","errorMessage":"Please enter a valid phone number (Ex: \'855 111-1111\'or \'(855) 111 1111\' ). ","placeholder":"Phone Number"}]},{"title":"Watch Information","fields":[{"label":"Watch Brand","type":"select","name":"watch_brand","id":"watch_brand","option":[{"value":"","name":"Watch Brand","isDefault":"true"},{"value":"Breitling","name":"Breitling","isDefault":"false"},{"value":"Cartier","name":"Cartier","isDefault":"false"},{"value":"Hublot","name":"Hublot","isDefault":"false"},{"value":"Omega","name":"Omega","isDefault":"false"},{"value":"IWC","name":"IWC","isDefault":"false"},{"value":"Patek Philippe","name":"Patek Philippe","isDefault":"false"}]},{"label":"Model / Series Name","type":"text","name":"model","id":"model","placeholder":"Model / Series Name"},{"label":"Model Number","type":"text","name":"model_number","id":"model-number","placeholder":"Model Number"},{"label":"Are original watch box and/or papers available?","type":"select","name":"box_or_papers","id":"box-or-papers","option":[{"value":"","name":"Are original watch box and/or papers available?","isDefault":"true"},{"value":"Box Only","name":"Box Only","isDefault":"false"},{"value":"Papers Only","name":"Papers Only","isDefault":"false"},{"value":"Box and Papers","name":"Box and Papers","isDefault":"false"},{"value":"Neither","name":"Neither","isDefault":"false"}]},{"label":"Purchase Date","type":"date","name":"purchase_date","id":"purchase-date","placeholder":"Purchase Date"},{"label":"Purchased From","type":"text","name":"purchased_from","id":"purchased-from","placeholder":"Purchased From"}]},{"title":"Tell us about the condition of your watch","fields":[{"label":"condition","type":"textarea","name":"condition","id":"condition","required":"not required","placeholder":"Please describe here the condition of your watch (2000 characters maximum)"},{"label":"dropzone","type":"dropzone","name":"dropzone-display","id":"dropzone-display","required":"not required"}]}]'
            ],
            [
                'name' => 'sell-us-your-watch',
                'email' => 'tradein@watchshopping.com',
                'status' => '1',
                'stored_id' =>'1',
                'detail' => '[{"title":"Your Information","fields":[{"label":"First name","type":"text","name":"first_name","id":"first-name","placeholder":"First name"},{"label":"Last name","type":"text","name":"last_name","id":"last-name","placeholder":"Last name"},{"label":"Email","type":"email","name":"email","id":"email","patterns":"^(([^<>()\\\\[\\\\]\\\\\\\\.,;:\\\\s@\\"]+(\\\\.[^<>()\\\\[\\\\]\\\\\\\\.,;:\\\\s@\\"]+)*)|(\\".+\\"))@((\\\\[[0-9]{1,3}\\\\.[0-9]{1,3}\\\\.[0-9]{1,3}\\\\.[0-9]{1,3}\\\\])|(([a-zA-Z\\\\-0-9]+\\\\.)+[a-zA-Z]{2,}))$","errorMessage":"Please enter a valid email address (Ex: johndoe@domain.com). ","placeholder":"Email"},{"label":"Phone Number","type":"text","name":"phone","id":"phone","patterns":"\\\\(?([0-9]{2,})\\\\)?([ .-]?)([0-9]{3,})([ .-]?)([0-9]{4})","errorMessage":"Please enter a valid phone number (Ex: \'855 111-1111\'or \'(855) 111 1111\' ). ","placeholder":"Phone Number"}]},{"title":"Watch Information","fields":[{"label":"Watch Brand","type":"select","name":"watch_brand","id":"watch_brand","option":[{"value":"","name":"Watch Brand","isDefault":"true"},{"value":"Breitling","name":"Breitling","isDefault":"false"},{"value":"Cartier","name":"Cartier","isDefault":"false"},{"value":"Hublot","name":"Hublot","isDefault":"false"},{"value":"Omega","name":"Omega","isDefault":"false"},{"value":"IWC","name":"IWC","isDefault":"false"},{"value":"Patek Philippe","name":"Patek Philippe","isDefault":"false"}]},{"label":"Model / Series Name","type":"text","name":"model","id":"model","placeholder":"Model / Series Name"},{"label":"Model Number","type":"text","name":"model_number","id":"model-number","placeholder":"Model Number"},{"label":"Are original watch box and/or papers available?","type":"select","name":"box_or_papers","id":"box-or-papers","option":[{"value":"","name":"Are original watch box and/or papers available?","isDefault":"true"},{"value":"Box Only","name":"Box Only","isDefault":"false"},{"value":"Papers Only","name":"Papers Only","isDefault":"false"},{"value":"Box and Papers","name":"Box and Papers","isDefault":"false"},{"value":"Neither","name":"Neither","isDefault":"false"}]},{"label":"Purchase Date","type":"date","name":"purchase_date","id":"purchase-date","placeholder":"Purchase Date"},{"label":"Purchased From","type":"text","name":"purchased_from","id":"purchased-from","placeholder":"Purchased From"}]},{"title":"Tell us about the condition of your watch","fields":[{"label":"condition","type":"textarea","name":"condition","id":"condition","required":"not required","placeholder":"Please describe here the condition of your watch (2000 characters maximum)"},{"label":"dropzone","type":"dropzone","name":"dropzone-display","id":"dropzone-display","required":"not required"}]}]'
            ],
            [
                'name' => 'customer-service',
                'email' => 'cs@watchshopping.com',
                'status' => '1',
                'stored_id' =>'1',
                'detail' => '[{"subtitle":"You can send an email any time with your question and/or comments to our Customer care Representatives.","fields":[{"label":"Email","type":"email","name":"email","id":"email","patterns":"^(([^<>()\\\\[\\\\]\\\\\\\\.,;:\\\\s@\"]+(\\\\.[^<>()\\\\[\\\\]\\\\\\\\.,;:\\\\s@\"]+)*)|(\".+\"))@((\\\\[[0-9]{1,3}\\\\.[0-9]{1,3}\\\\.[0-9]{1,3}\\\\.[0-9]{1,3}\\\\])|(([a-zA-Z\\\\-0-9]+\\\\.)+[a-zA-Z]{2,}))$","errorMessage":"Please enter a valid email address (Ex: johndoe@domain.com). ","placeholder":"Email*"},{"label":"Full Name","type":"text","name":"full_name","id":"full-name","placeholder":"Full Name*"},{"label":"subject","type":"select","name":"question_subject","id":"question-subject","option":[{"value":"","name":"Please select a subject","isDefault":"true"},{"value":"Design","name":"Design","isDefault":"false"}]},{"label":"Order Number","type":"text","name":"order_number","id":"order-number","required":"not required","placeholder":"Order Number (if applicable)"},{"label":"Comments","type":"textarea","name":"comments","id":"comments","placeholder":"Add your comments and questions here..."},{"label":"dropzone-not-required","type":"dropzone","name":"dropzone-display","id":"dropzone-display","required":"not required"},{"label":"Sign me up for deals:","type":"checkbox","name":"sign_up","id":"agreement","value":"yes","class":"sign-up","placeholder":"Add your comments and questions here..."}]}]'
            ],
            [
                'name' => 'update-your-email',
                'email' => '',
                'status' => '1',
                'stored_id' =>'1',
                'detail' => '[{"title":"Please take a moment to fill out the form below:","subtitle":"Give us a moment of your time to tell us more about yourself, and we\'ll give you precisely the content you want.","fields":[{"label":"Email","type":"email","name":"email","patterns":"^(([^<>()\\\\[\\\\]\\\\\\\\.,;:\\\\s@\"]+(\\\\.[^<>()\\\\[\\\\]\\\\\\\\.,;:\\\\s@\"]+)*)|(\".+\"))@((\\\\[[0-9]{1,3}\\\\.[0-9]{1,3}\\\\.[0-9]{1,3}\\\\.[0-9]{1,3}\\\\])|(([a-zA-Z\\\\-0-9]+\\\\.)+[a-zA-Z]{2,}))$","errorMessage":"Please enter a valid email address (Ex: johndoe@domain.com). ","id":"email","placeholder":"Email*"},{"label":"First Name","type":"text","name":"first_name","id":"first-name","placeholder":"First Name"}]},{"title":"We’ve got exclusive coupons for birthdays and anniversaries!","subtitle":"Exclusive coupons near your birthday and anniversary","fields":[{"label":"Birthday","type":"date","name":"birthday","id":"birthday"},{"label":"Anniversary","type":"date","name":"anniversary","id":"anniversary"}]},{"title":"Want daily deals?","subtitle":"Exclusive coupons near your birthday and anniversary","fields":[{"label":"Yes, please send me the best deals.","type":"radio","name":"send_daily_deals","id":"send-daily-deals","check":"checked","value":"yes"},{"label":"No thanks","type":"radio","name":"send_daily_deals","id":"send-daily-deals","check":"","value":"no"}]},{"title":"What products are you interested in?","subtitle":"Help us get to know you better","fields":[{"label":"Watches","type":"checkbox","name":"interest_product[]","id":"interest-product","value":"Watches","class":"Watches"},{"label":"Luxury Watches","type":"checkbox","name":"interest_product[]","id":"interest-product","value":"Luxury Watches","class":"Luxury-Watches"},{"label":"Men\'s Watches","type":"checkbox","name":"interest_product[]","id":"interest-product","value":"Men\'s Watches","class":"Men-Watches"},{"label":"Ladies Watches","type":"checkbox","name":"interest_product[]","id":"interest-product","value":"Ladies Watches","class":"Ladies-Watches"}]},{"title":"What information would you like to know about","subtitle":"We have great campaigns that be tailored to your interests","fields":[{"label":"Flash Sales","type":"checkbox","name":"campaigns[]","id":"campaigns","value":"flash_sales","class":"flash-sales"},{"label":"Email Exclusive Sales","type":"checkbox","name":"campaigns[]","id":"campaigns","value":"email_exclusive_sales","class":"email-exclusive-sales"},{"label":"Hand-picked products just for me","type":"checkbox","name":"campaigns[]","id":"campaigns","value":"hand_picked_products_just_for_me","class":"hand-picked-products-just-for-me"},{"label":"Last chance products","type":"checkbox","name":"campaigns[]","id":"campaigns","value":"last_chance_products","class":"last-chance-products"},{"label":"dropzone-not-required","type":"dropzone","name":"dropzone-display","id":"dropzone-display","required":"not required"}]}]'
            ]
        ];

        foreach ($data as $item) {
            $formFormat = $this->formFormatRepository->getByName($item['name']);

            $formFormat->setName($item['name']);
            $formFormat->setEmail($item['email']);
            $formFormat->setStatus($item['status']);
            $formFormat->setStoreId($item['stored_id']);
            $formFormat->setDetail($item['detail']);

            $this->formFormatRepository->save($formFormat);
        }

        $installer->endSetup();
    }
}

