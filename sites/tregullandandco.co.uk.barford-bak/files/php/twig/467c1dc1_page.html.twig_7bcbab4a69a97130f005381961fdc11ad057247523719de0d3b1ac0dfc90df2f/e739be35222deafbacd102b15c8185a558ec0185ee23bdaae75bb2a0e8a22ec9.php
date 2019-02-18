<?php

/* themes/custom/barford/templates/layout/page.html.twig */
class __TwigTemplate_3cfefd4e1d7b6c93c0e04dfbfc87de2a6a0d71ddb9ec0c6a1f2e55d5c23c09cc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("if" => 17);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 17
        if ((isset($context["is_front"]) ? $context["is_front"] : null)) {
            // line 18
            echo "  <div id=\"preloader\">
    <div id=\"status\">
      <div class=\"ball-grid-pulse\">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
  </div>
";
        }
        // line 33
        echo " 
<div id=\"page\"> 
  ";
        // line 35
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "showcase", array())) {
            // line 36
            echo "    <header id=\"header\">
  ";
        } else {
            // line 38
            echo "    <header id=\"header\" class=\"without-showcase\">      
  ";
        }
        // line 39
        echo " 
    <div class=\"inner\">
      <div id=\"header-top\" class=\"expanded row collapse text-center\">
        <div id=\"menu-sub\" class=\"medium-3 large-4 column show-for-large\">
         ";
        // line 43
        if ((isset($context["show_back_to_landing_link"]) ? $context["show_back_to_landing_link"] : null)) {
            // line 44
            echo "          <div class=\"back_link_container\"><a href=\"http://www.tregullandandco.co.uk/\"><img src=\"/themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/images/treg-co-logo-black.png\" /></a></div>
          ";
        }
        // line 46
        echo "          ";
        if (((isset($context["show_back_to_landing_link"]) ? $context["show_back_to_landing_link"] : null) == false)) {
            // line 47
            echo "          &nbsp;
          ";
        }
        // line 49
        echo "        </div>
        ";
        // line 50
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "primary_menu_mobile", array())) {
            // line 51
            echo "          <div id=\"menu-mobile\" class=\"small-3 medium-3 column hide-for-large\">
            <button type=\"button\" class=\"button hollow ghost\" title=\"Menu\" data-toggle=\"reveal-menu\">menu</button>
          </div>
        ";
        }
        // line 55
        echo "        <div id=\"site-info\" class=\"small-6 medium-6 large-4 column\">        
          ";
        // line 56
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "site_info", array())) {
            echo "          
            ";
            // line 57
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "site_info", array()), "html", null, true));
            echo "
          ";
        }
        // line 59
        echo "        </div>
        <div id=\"social-media\" class=\"large-4 column show-for-large\">
          ";
        // line 61
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "social_media", array()), "html", null, true));
        echo "
        </div>
      </div>
      <div id=\"header-bottom\" class=\"show-for-large\">
        ";
        // line 65
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "primary_menu", array())) {
            // line 66
            echo "          <div id=\"menu-primary\" class=\"expanded column row\">
            ";
            // line 67
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "primary_menu", array()), "html", null, true));
            echo "
          </div>
        ";
        }
        // line 69
        echo "     
      </div>
      <div class=\"large reveal fast\" id=\"reveal-search\" data-reveal data-close-on-click=\"true\" data-animation-in=\"scale-in-up\" data-animation-out=\"scale-out-down\">
        <button class=\"close-button\" data-close aria-label=\"Close reveal\" type=\"button\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
        ";
        // line 75
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "search", array()), "html", null, true));
        echo "
      </div>
      <div class=\"full reveal fast text-center\" id=\"reveal-menu\" data-reveal data-close-on-click=\"true\" data-animation-in=\"scale-in-up\" data-animation-out=\"scale-out-down\">
        <div class=\"row\">
          <button class=\"close-button\" data-close aria-label=\"Close reveal\" type=\"button\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
          <div id=\"reveal-site-info\">        
            ";
        // line 83
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "site_info", array())) {
            echo "          
              ";
            // line 84
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "site_info", array()), "html", null, true));
            echo "
            ";
        }
        // line 86
        echo "          </div>
          ";
        // line 87
        if (((isset($context["omni_header_login"]) ? $context["omni_header_login"] : null) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "search", array()))) {
            // line 88
            echo "            <div id=\"reveal-menu-sub\" class=\"menu-centered\">
              <ul class=\"menu\">
                ";
            // line 90
            if ((isset($context["omni_header_login"]) ? $context["omni_header_login"] : null)) {
                // line 91
                echo "                  <li><a class=\"login\" href=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["base_path"]) ? $context["base_path"] : null), "html", null, true));
                echo "user\"><span class=\"fa fa-user\" aria-hidden=\"true\"></span>Login</a></li>
                  <li class=\"menu-text\"> | </li>
                  <li><a class=\"register\" href=\"";
                // line 93
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["base_path"]) ? $context["base_path"] : null), "html", null, true));
                echo "user/register\"><span class=\"fa fa-pencil\" aria-hidden=\"true\"></span>Register</a></li>
                  <li class=\"menu-text\"> | </li>
                ";
            }
            // line 96
            echo "                ";
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "search", array())) {
                // line 97
                echo "                  <li><a data-toggle=\"reveal-search\"><span class=\"fa fa-search\" aria-hidden=\"true\"></span>Search</a></li>
                ";
            }
            // line 99
            echo "              </ul>
            </div>
          ";
        }
        // line 102
        echo "          ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "primary_menu_mobile", array())) {
            // line 103
            echo "            <div id=\"reveal-menu-mobile\">          
              ";
            // line 104
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "primary_menu_mobile", array()), "html", null, true));
            echo "
            </div>
          ";
        }
        // line 106
        echo " 
          ";
        // line 107
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "social_media", array())) {
            // line 108
            echo "            <div id=\"reveal-social-media\">
              ";
            // line 109
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "social_media", array()), "html", null, true));
            echo "
            </div>
          ";
        }
        // line 112
        echo "        </div>
      </div>
    </div>  
  </header>        
  ";
        // line 116
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "showcase", array())) {
            // line 117
            echo "    <div id=\"showcase\">
      ";
            // line 118
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "showcase", array()), "html", null, true));
            echo "
    </div>
  ";
        }
        // line 121
        echo "  ";
        if ( !twig_test_empty($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "secondary_menu", array()))) {
            echo "    
    <div class=\"show-for-medium\" data-sticky-container>
      <div id=\"menu-secondary\" class=\"expanded row collapse\" data-sticky data-margin-top=\"0\" data-top-anchor=\"main:top\" data-btm-anchor=\"main:bottom\">
        <div class=\"medium-11 column\">
          ";
            // line 125
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "secondary_menu", array()), "html", null, true));
            echo "
        </div>
        <div class=\"medium-1 column\">
          <ul class=\"menu expanded text-center\">
            <li><a data-scroll href=\"#menu-secondary\"><span class=\"fa fa-angle-up\" aria-hidden=\"true\"></span></a></li>
            <li><a data-scroll data-options='{\"offset\": 0}' href=\"#menu-secondary\"><span class=\"fa fa-angle-down\" aria-hidden=\"true\"></span></a></li>
          </ul>
        </div>
      </div>
    </div>
  ";
        }
        // line 136
        echo "  <div id=\"main\">
    ";
        // line 137
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "main_top", array())) {
            // line 138
            echo "      <div id=\"main-top\">
        ";
            // line 139
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "main_top", array()), "html", null, true));
            echo "    
      </div> 
    ";
        }
        // line 142
        echo "    ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content", array())) {
            // line 143
            echo "      <div id=\"main-middle\">
        <div class=\"row\">
          <div id=\"primary\" class=\"";
            // line 145
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["primary_width"]) ? $context["primary_width"] : null), "html", null, true));
            echo "column\">
            ";
            // line 146
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "breadcrumb", array())) {
                // line 147
                echo "              ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "breadcrumb", array()), "html", null, true));
                echo "
            ";
            }
            // line 149
            echo "            ";
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "highlighted", array())) {
                echo "            
              <div id=\"highlight\">
                ";
                // line 151
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "highlighted", array()), "html", null, true));
                echo "
              </div>
            ";
            }
            // line 154
            echo "            <div id=\"content\" class=\"clearfix\">
              ";
            // line 155
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content", array()), "html", null, true));
            echo "
            </div>                
          </div>                        
          ";
            // line 158
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_secondary", array())) {
                // line 159
                echo "            <div id=\"secondary\" class=\"large-4 column sidebar\">
              ";
                // line 160
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_secondary", array()), "html", null, true));
                echo "
            </div>
          ";
            }
            // line 163
            echo "        </div>
      </div>
    ";
        }
        // line 166
        echo "    ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "main_bottom", array())) {
            // line 167
            echo "      <div id=\"main-bottom\">
        ";
            // line 168
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "main_bottom", array()), "html", null, true));
            echo "         
      </div> 
    ";
        }
        // line 170
        echo "    
  </div>   
  ";
        // line 172
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array()) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "closure", array()))) {
            // line 173
            echo "    <footer id=\"footer\">
      ";
            // line 174
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array()), "html", null, true));
            echo "  
      <div id=\"closure\">
        <div class=\"row\">
          <div class=\"large-8 column\">
            ";
            // line 178
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "closure", array()), "html", null, true));
            echo "
          </div>
          <div class=\"large-4 column show-for-large\">
            <ul class=\"menu align-right\"><li><span  class=\"design-by\"> TREGULLAND © Copyright 2011 - 2016</a></li></ul>
          </div>
        </div>
      </div>  
    </footer>
  ";
        }
        // line 186
        echo "  
</div>";
    }

    public function getTemplateName()
    {
        return "themes/custom/barford/templates/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  379 => 186,  367 => 178,  360 => 174,  357 => 173,  355 => 172,  351 => 170,  345 => 168,  342 => 167,  339 => 166,  334 => 163,  328 => 160,  325 => 159,  323 => 158,  317 => 155,  314 => 154,  308 => 151,  302 => 149,  296 => 147,  294 => 146,  290 => 145,  286 => 143,  283 => 142,  277 => 139,  274 => 138,  272 => 137,  269 => 136,  255 => 125,  247 => 121,  241 => 118,  238 => 117,  236 => 116,  230 => 112,  224 => 109,  221 => 108,  219 => 107,  216 => 106,  210 => 104,  207 => 103,  204 => 102,  199 => 99,  195 => 97,  192 => 96,  186 => 93,  180 => 91,  178 => 90,  174 => 88,  172 => 87,  169 => 86,  164 => 84,  160 => 83,  149 => 75,  141 => 69,  135 => 67,  132 => 66,  130 => 65,  123 => 61,  119 => 59,  114 => 57,  110 => 56,  107 => 55,  101 => 51,  99 => 50,  96 => 49,  92 => 47,  89 => 46,  85 => 44,  83 => 43,  77 => 39,  73 => 38,  69 => 36,  67 => 35,  63 => 33,  45 => 18,  43 => 17,);
    }
}
/* {#*/
/* /* COPYRIGHT*/
/* ------------------------------------------------------------------  */
/*   Omni for Drupal 8.x - Version 1.0                           */
/*   Copyright (C) 2016 esors.com All Rights Reserved.           */
/*   @license - Copyrighted Commercial Software                   */
/* ------------------------------------------------------------------  */
/*   Theme Name: Omni Portfolio                                           */
/*   Author: ESORS                                           */
/*   Date: 19th August 2016                                        */
/*   Website: http://www.esors.com/                              */
/* ------------------------------------------------------------------  */
/*   This file may not be redistributed in whole or   */
/*   significant part.                                            */
/* ----------------------------------------------------------------*//* */
/* #}*/
/* {% if is_front %}*/
/*   <div id="preloader">*/
/*     <div id="status">*/
/*       <div class="ball-grid-pulse">*/
/*         <div></div>*/
/*         <div></div>*/
/*         <div></div>*/
/*         <div></div>*/
/*         <div></div>*/
/*         <div></div>*/
/*         <div></div>*/
/*         <div></div>*/
/*         <div></div>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* {% endif %} */
/* <div id="page"> */
/*   {% if page.showcase %}*/
/*     <header id="header">*/
/*   {% else %}*/
/*     <header id="header" class="without-showcase">      */
/*   {% endif %} */
/*     <div class="inner">*/
/*       <div id="header-top" class="expanded row collapse text-center">*/
/*         <div id="menu-sub" class="medium-3 large-4 column show-for-large">*/
/*          {% if show_back_to_landing_link %}*/
/*           <div class="back_link_container"><a href="http://www.tregullandandco.co.uk/"><img src="/themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/images/treg-co-logo-black.png" /></a></div>*/
/*           {% endif %}*/
/*           {% if show_back_to_landing_link == false %}*/
/*           &nbsp;*/
/*           {% endif %}*/
/*         </div>*/
/*         {% if page.primary_menu_mobile %}*/
/*           <div id="menu-mobile" class="small-3 medium-3 column hide-for-large">*/
/*             <button type="button" class="button hollow ghost" title="Menu" data-toggle="reveal-menu">menu</button>*/
/*           </div>*/
/*         {% endif %}*/
/*         <div id="site-info" class="small-6 medium-6 large-4 column">        */
/*           {% if page.site_info %}          */
/*             {{ page.site_info }}*/
/*           {% endif %}*/
/*         </div>*/
/*         <div id="social-media" class="large-4 column show-for-large">*/
/*           {{ page.social_media }}*/
/*         </div>*/
/*       </div>*/
/*       <div id="header-bottom" class="show-for-large">*/
/*         {% if page.primary_menu %}*/
/*           <div id="menu-primary" class="expanded column row">*/
/*             {{ page.primary_menu }}*/
/*           </div>*/
/*         {% endif %}     */
/*       </div>*/
/*       <div class="large reveal fast" id="reveal-search" data-reveal data-close-on-click="true" data-animation-in="scale-in-up" data-animation-out="scale-out-down">*/
/*         <button class="close-button" data-close aria-label="Close reveal" type="button">*/
/*           <span aria-hidden="true">&times;</span>*/
/*         </button>*/
/*         {{ page.search }}*/
/*       </div>*/
/*       <div class="full reveal fast text-center" id="reveal-menu" data-reveal data-close-on-click="true" data-animation-in="scale-in-up" data-animation-out="scale-out-down">*/
/*         <div class="row">*/
/*           <button class="close-button" data-close aria-label="Close reveal" type="button">*/
/*             <span aria-hidden="true">&times;</span>*/
/*           </button>*/
/*           <div id="reveal-site-info">        */
/*             {% if page.site_info %}          */
/*               {{ page.site_info }}*/
/*             {% endif %}*/
/*           </div>*/
/*           {% if omni_header_login or page.search %}*/
/*             <div id="reveal-menu-sub" class="menu-centered">*/
/*               <ul class="menu">*/
/*                 {% if omni_header_login %}*/
/*                   <li><a class="login" href="{{ base_path }}user"><span class="fa fa-user" aria-hidden="true"></span>Login</a></li>*/
/*                   <li class="menu-text"> | </li>*/
/*                   <li><a class="register" href="{{ base_path }}user/register"><span class="fa fa-pencil" aria-hidden="true"></span>Register</a></li>*/
/*                   <li class="menu-text"> | </li>*/
/*                 {% endif %}*/
/*                 {% if page.search %}*/
/*                   <li><a data-toggle="reveal-search"><span class="fa fa-search" aria-hidden="true"></span>Search</a></li>*/
/*                 {% endif %}*/
/*               </ul>*/
/*             </div>*/
/*           {% endif %}*/
/*           {% if page.primary_menu_mobile %}*/
/*             <div id="reveal-menu-mobile">          */
/*               {{ page.primary_menu_mobile }}*/
/*             </div>*/
/*           {% endif %} */
/*           {% if page.social_media %}*/
/*             <div id="reveal-social-media">*/
/*               {{ page.social_media }}*/
/*             </div>*/
/*           {% endif %}*/
/*         </div>*/
/*       </div>*/
/*     </div>  */
/*   </header>        */
/*   {% if page.showcase %}*/
/*     <div id="showcase">*/
/*       {{ page.showcase }}*/
/*     </div>*/
/*   {% endif %}*/
/*   {% if page.secondary_menu is not empty %}    */
/*     <div class="show-for-medium" data-sticky-container>*/
/*       <div id="menu-secondary" class="expanded row collapse" data-sticky data-margin-top="0" data-top-anchor="main:top" data-btm-anchor="main:bottom">*/
/*         <div class="medium-11 column">*/
/*           {{ page.secondary_menu }}*/
/*         </div>*/
/*         <div class="medium-1 column">*/
/*           <ul class="menu expanded text-center">*/
/*             <li><a data-scroll href="#menu-secondary"><span class="fa fa-angle-up" aria-hidden="true"></span></a></li>*/
/*             <li><a data-scroll data-options='{"offset": 0}' href="#menu-secondary"><span class="fa fa-angle-down" aria-hidden="true"></span></a></li>*/
/*           </ul>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   {% endif %}*/
/*   <div id="main">*/
/*     {% if page.main_top %}*/
/*       <div id="main-top">*/
/*         {{ page.main_top }}    */
/*       </div> */
/*     {% endif %}*/
/*     {% if page.content %}*/
/*       <div id="main-middle">*/
/*         <div class="row">*/
/*           <div id="primary" class="{{primary_width}}column">*/
/*             {% if page.breadcrumb %}*/
/*               {{ page.breadcrumb }}*/
/*             {% endif %}*/
/*             {% if page.highlighted %}            */
/*               <div id="highlight">*/
/*                 {{ page.highlighted }}*/
/*               </div>*/
/*             {% endif %}*/
/*             <div id="content" class="clearfix">*/
/*               {{ page.content }}*/
/*             </div>                */
/*           </div>                        */
/*           {% if page.sidebar_secondary %}*/
/*             <div id="secondary" class="large-4 column sidebar">*/
/*               {{ page.sidebar_secondary }}*/
/*             </div>*/
/*           {% endif %}*/
/*         </div>*/
/*       </div>*/
/*     {% endif %}*/
/*     {% if page.main_bottom %}*/
/*       <div id="main-bottom">*/
/*         {{ page.main_bottom }}         */
/*       </div> */
/*     {% endif %}    */
/*   </div>   */
/*   {% if page.footer or page.closure %}*/
/*     <footer id="footer">*/
/*       {{ page.footer }}  */
/*       <div id="closure">*/
/*         <div class="row">*/
/*           <div class="large-8 column">*/
/*             {{ page.closure }}*/
/*           </div>*/
/*           <div class="large-4 column show-for-large">*/
/*             <ul class="menu align-right"><li><span  class="design-by"> TREGULLAND © Copyright 2011 - 2016</a></li></ul>*/
/*           </div>*/
/*         </div>*/
/*       </div>  */
/*     </footer>*/
/*   {% endif %}  */
/* </div>*/
