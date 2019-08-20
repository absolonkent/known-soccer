<?php

    namespace IdnoPlugins\Soccer {

        class ContentType extends \Idno\Common\ContentType {

            public $title = 'Soccer Results';
            public $category_title = 'Soccer Results';
            public $entity_class = 'IdnoPlugins\\Soccer\\Soccer';
            public $logo = '<i class="icon-align-left"></i>';
            public $indieWebContentType = array('article','soccer');

        }

    }
