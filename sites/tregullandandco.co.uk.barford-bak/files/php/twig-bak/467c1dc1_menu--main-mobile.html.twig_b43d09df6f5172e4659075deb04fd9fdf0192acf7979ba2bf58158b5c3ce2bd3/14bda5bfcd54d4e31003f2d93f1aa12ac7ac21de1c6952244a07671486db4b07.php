<?php

/* themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/navigation/menu--main-mobile.html.twig */
class __TwigTemplate_8c477dcbe4cdf8bb2211097a66376f8b1bb132e5b33e0b26d055777b4ca5f106 extends Twig_Template
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
        $tags = array("import" => 17, "macro" => 25, "if" => 27, "set" => 28, "for" => 30);
        $filters = array("length" => 28, "split" => 41);
        $functions = array("link" => 44);

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('import', 'macro', 'if', 'set', 'for'),
                array('length', 'split'),
                array('link')
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
        $context["menus"] = $this;
        // line 18
        echo "
";
        // line 23
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["menus"]->getmenu_links((isset($context["items"]) ? $context["items"] : null), (isset($context["attributes"]) ? $context["attributes"] : null), 0)));
        echo "

";
    }

    // line 25
    public function getmenu_links($__items__ = null, $__attributes__ = null, $__menu_level__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "items" => $__items__,
            "attributes" => $__attributes__,
            "menu_level" => $__menu_level__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 26
            echo "  ";
            $context["menus"] = $this;
            // line 27
            echo "  ";
            if ((isset($context["items"]) ? $context["items"] : null)) {
                // line 28
                echo "  ";
                $context["size"] = twig_length_filter($this->env, (isset($context["items"]) ? $context["items"] : null));
                // line 29
                echo "    <div class=\"menu-table size-";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["size"]) ? $context["size"] : null), "html", null, true));
                echo "\">
      ";
                // line 30
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 31
                    echo "        ";
                    // line 32
                    $context["classes"] = array(0 => "menu-item");
                    // line 35
                    echo "        
        ";
                    // line 36
                    if ((($this->getAttribute($context["loop"], "index", array()) % 3) == 1)) {
                        // line 37
                        echo "          <div class=\"menu-row\">
        ";
                    }
                    // line 39
                    echo "          <div class=\"menu-column\"> 
            ";
                    // line 40
                    if (twig_in_filter("|", $this->getAttribute($context["item"], "title", array()))) {
                        // line 41
                        echo "              ";
                        $context["title"] = twig_split_filter($this->env, $this->getAttribute($context["item"], "title", array()), "|");
                        echo "  
              <a href=\"";
                        // line 42
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true));
                        echo "\" class=\"menu-item\"><span class='";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["title"]) ? $context["title"] : null), 1, array()), "html", null, true));
                        echo "'></span>";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["title"]) ? $context["title"] : null), 0, array()), "html", null, true));
                        echo "</a>            
            ";
                    } else {
                        // line 44
                        echo "              ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->getLink($this->getAttribute($context["item"], "title", array()), $this->getAttribute($context["item"], "url", array()), $this->getAttribute($this->getAttribute($context["item"], "attributes", array()), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method")), "html", null, true));
                        echo "
            ";
                    }
                    // line 45
                    echo "      
          </div>
        ";
                    // line 47
                    if (((($this->getAttribute($context["loop"], "index", array()) % 3) == 0) || $this->getAttribute($context["loop"], "last", array()))) {
                        // line 48
                        echo "          </div>
        ";
                    }
                    // line 50
                    echo "      ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 51
                echo "    </div>    
  ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/navigation/menu--main-mobile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 51,  148 => 50,  144 => 48,  142 => 47,  138 => 45,  132 => 44,  123 => 42,  118 => 41,  116 => 40,  113 => 39,  109 => 37,  107 => 36,  104 => 35,  102 => 32,  100 => 31,  83 => 30,  78 => 29,  75 => 28,  72 => 27,  69 => 26,  55 => 25,  48 => 23,  45 => 18,  43 => 17,);
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
/* {% import _self as menus %}*/
/* */
/* {#*/
/*   We call a macro which calls itself to render the full tree.*/
/*   @see http://twig.sensiolabs.org/doc/tags/macro.html*/
/* #}*/
/* {{ menus.menu_links(items, attributes, 0) }}*/
/* */
/* {% macro menu_links(items, attributes, menu_level) %}*/
/*   {% import _self as menus %}*/
/*   {% if items %}*/
/*   {% set size = items|length %}*/
/*     <div class="menu-table size-{{ size }}">*/
/*       {% for item in items %}*/
/*         {%*/
/*           set classes = [*/
/*             'menu-item',*/
/*           ]*/
/*         %}        */
/*         {% if loop.index % 3 == 1 %}*/
/*           <div class="menu-row">*/
/*         {% endif %}*/
/*           <div class="menu-column"> */
/*             {% if '|' in item.title %}*/
/*               {% set title = item.title|split('|') %}  */
/*               <a href="{{ item.url }}" class="menu-item"><span class='{{ title.1 }}'></span>{{ title.0 }}</a>            */
/*             {% else %}*/
/*               {{ link(item.title, item.url, item.attributes.addClass(classes)) }}*/
/*             {% endif %}      */
/*           </div>*/
/*         {% if loop.index % 3 == 0 or loop.last %}*/
/*           </div>*/
/*         {% endif %}*/
/*       {% endfor %}*/
/*     </div>    */
/*   {% endif %}*/
/* {% endmacro %}*/
/* */
