<?php

    /**
     * Geolocation callback
     */

    namespace IdnoPlugins\Soccer\Pages {

        /**
         * Default class to serve the geolocation callback
         */
        class Callback extends \Idno\Common\Page
        {

            function post()
            {
                $this->createGatekeeper(); // Logged-in users only
                $lat = $this->getInput('lat');
                $long = $this->getInput('long');
                if (!empty($lat) && (!empty($long))) {
                    echo json_encode(\IdnoPlugins\Soccer\Soccer::queryLatLong($lat, $long));
                }
            }

        }

    }