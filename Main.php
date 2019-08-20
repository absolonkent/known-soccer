<?php

    namespace IdnoPlugins\Soccer {

        class Main extends \Idno\Common\Plugin {

            function registerPages() {
                \Idno\Core\site()->addPageHandler('/soccer/edit/?', '\IdnoPlugins\Soccer\Pages\Edit');
                \Idno\Core\site()->addPageHandler('/soccer/edit/([A-Za-z0-9]+)/?', '\IdnoPlugins\Soccer\Pages\Edit');
                \Idno\Core\site()->addPageHandler('/soccer/delete/([A-Za-z0-9]+)/?', '\IdnoPlugins\Soccer\Pages\Delete');
                \Idno\Core\site()->addPageHandler('/soccer/([A-Za-z0-9]+)/.*', '\Idno\Pages\Entity\View');
                \Idno\Core\site()->addPageHandler('/soccer/callback/?', '\IdnoPlugins\Soccer\Pages\Callback');
				
				\Idno\Core\site()->template()->extendTemplate('shell/head','soccer/head');
				}

            /**
             * Get the total file usage
             * @param bool $user
             * @return int
             */
            function getFileUsage($user = false) {

                $total = 0;

                if (!empty($user)) {
                    $search = ['user' => $user];
                } else {
                    $search = [];
                }

                if ($soccera = soccer::get($search,[],9999,0)) {
                    foreach($soccera as $soccer) {
                        /* @var review $review */
                        if ($soccer instanceof soccer) {
                            if ($attachments = $soccer ->getAttachments()) {
                                foreach($attachments as $attachment) {
                                    $total += $attachment['length'];
                                }
                            }
                        }
                    }
                }

                return $total;
            }

        }

    }
