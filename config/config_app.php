<?php

class ConfigApp {

  public static $ACTION = 'action';
  public static $ACTION_DEFAULT = 'home';
  
  /*
   * Definen que áreas del sitio web se cargan
   * */
  public static $ACTION_LOAD_BOOK_LIST = 'admin-list-books';
  public static $ACTION_LOAD_BOOK_FORM = 'admin-book-form';
  public static $ACTION_LOAD_SECTION_LIST = 'admin-list-section';
  public static $ACTION_LOAD_SECTION_FORM = 'admin-section-form';
 // public static $ACTION_LOAD_CATALOG = 'booksList';
  public static $ACTION_LOAD_FAQS = 'faq';
  public static $ACTION_LOAD_CATALOG = 'catalog';
  public static $ACTION_LOAD_LOGIN = 'login';
  
  /*
   * Definen acciones a ejecutar sobre el contenido del sitio
   * */
  public static $ACTION_ADD_BOOK = 'add-book'; //para agrear el libro ?
  public static $ACTION_ADD_SECTION = 'add-section';

  /*
   * Definen el login/logout
   * */
  public static $ACTION_RUN_LOGIN = 'loginIn';
  public static $ACTION_RUN_LOGOUT = 'logout';
  
  /*
   * Definen constantes asociadas a la Vista del sitio
   * */
  public static $VIEW_CONTENT = 'content';
  public static $VIEW_NAV = 'nav';
  public static $VIEW_TEMPLATE_BASEPATH = 'templates/';
  public static $VIEW_COMPONENT_BASEPATH = 'templates/components/';
  public static $VIEW_BASE_TEMPLATE = 'index';
  public static $VIEW_TPL_EXT = '.tpl';

}
