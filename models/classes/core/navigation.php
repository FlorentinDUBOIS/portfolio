<?php
    // ------------------------------------------------------------------------
    // Navigation object
    // ------------------------------------------------------------------------
    abstract class Navigation {
        // ------------------------------------------------------------------------
        /**
            * function that return menus of group
            * @param int
            * @return MenuGroup
        **/
        public static function &getMenus( int $groupid ) : MenuGroup {
            if( isset( self::$menugroups[ $groupid] )) {
                return self::$menugroups[ $groupid];
            }

            return self::$menugroups[ $groupid] = new MenuGroup( $groupid );
        }

        // ------------------------------------------------------------------------
        /**
            * function that return buttons of group
            * @param int
            * @return ButtonGroup
        **/
        public static function &getButtons( int $groupid ) : ButtonGroup {
            if( isset( self::$buttongroups[ $groupid] )) {
                return self::$buttongroups[ $groupid];
            }

            return self::$buttongroups[ $groupid] = new ButtonGroup( $groupid );
        }

        private static $menugroups   = [];
        private static $buttongroups = [];
    }
?>
