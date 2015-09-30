<?php

class ConfigApp {

  public static $ACTION = 'action';
  public static $ACTION_DEFAULT = 'home';
  public static $ACTION_ADMIN = 'admin';
  public static $ACTION_BOOK = 'book';
  public static $ACTION_BOOK_ADD = 'add-book'; //para agrear el libro ?
  public static $ACTION_FAQS = 'faq';
  public static $ACTION_CATALOG = 'catalog';
  public static $ACTION_SECTION = 'section';
  public static $ACTION_SECTION_ADD = 'add-section';
  public static $ACTION_LOGIN = 'login';
  public static $ACTION_LOGIN_EXEC = 'loginIn';
  public static $ACTION_LOGOUT_EXEC = 'logout';
  public static $ACTION_CATEGORY = 'category';
  public static $ACTION_CATEGORY_ADD = 'add-category';
  public static $ACTION_GET_CATALOG_BY_ID = 'booksList';

  public static $VIEW_CONTENT = 'content';
  public static $VIEW_NAV = 'nav';
  public static $VIEW_TEMPLATE_BASEPATH = 'templates/';
  public static $VIEW_COMPONENT_BASEPATH = 'templates/components/';
  public static $VIEW_BASE_TEMPLATE = 'index';

  public static $VIEW_TPL_EXT = '.tpl';

}
