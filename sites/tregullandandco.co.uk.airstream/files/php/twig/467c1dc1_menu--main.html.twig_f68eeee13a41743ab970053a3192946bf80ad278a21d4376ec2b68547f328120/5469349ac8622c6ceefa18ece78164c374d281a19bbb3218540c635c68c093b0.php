<?php

/* themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/navigation/menu--main.html.twig */
class __TwigTemplate_bf0dd55b02e02cb6c8c32a29e1799af50a4faabecd44544967f0d00383a0a681 extends Twig_Template
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
        $tags = array("import" => 17, "macro" => 27, "if" => 29, "for" => 38, "set" => 40);
        $filters = array();
        $functions = array("link" => 48);

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('import', 'macro', 'if', 'for', 'set'),
                array(),
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
        echo "<div class=\"menu-centered\">
  ";
        // line 24
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["menus"]->getmenu_links((isset($context["items"]) ? $context["items"] : null), (isset($context["attributes"]) ? $context["attributes"] : null), 0)));
        echo "
</div>

";
    }

    // line 27
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
            // line 28
            echo "  ";
            $context["menus"] = $this;
            // line 29
            echo "  ";
            if ((isset($context["items"]) ? $context["items"] : null)) {
                // line 30
                echo "    ";
                if (((isset($context["menu_level"]) ? $context["menu_level"] : null) == 0)) {
                    // line 31
                    echo "      <ul class=\"dropdown menu\" data-dropdown-menu>
    ";
                } else {
                    // line 33
                    echo "      <ul class=\"menu\">
        ";
                    // line 34
                    if ((((isset($context["menu_level"]) ? $context["menu_level"] : null) == 1) || ((isset($context["menu_level"]) ? $context["menu_level"] : null) == 2))) {
                        // line 35
                        echo "          <li class=\"menu-arrow\"></li>
        ";
                    }
                    // line 37
                    echo "    ";
                }
                // line 38
                echo "    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 39
                    echo "      ";
                    // line 40
                    $context["classes"] = array(0 => "menu-item", 1 => (($this->getAttribute(                    // line 42
$context["item"], "is_expanded", array())) ? ("menu-item--expanded") : ("")), 2 => (($this->getAttribute(                    // line 43
$context["item"], "is_collapsed", array())) ? ("menu-item--collapsed") : ("")), 3 => (($this->getAttribute(                    // line 44
$context["item"], "in_active_trail", array())) ? ("menu-item--active-trail") : ("")));
                    // line 47
                    echo "      <li";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["item"], "attributes", array()), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
                    echo ">
        ";
                    // line 48
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->getLink($this->getAttribute($context["item"], "title", array()), $this->getAttribute($context["item"], "url", array())), "html", null, true));
                    echo "
        ";
                    // line 49
                    if ($this->getAttribute($context["item"], "below", array())) {
                        // line 50
                        echo "          ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["menus"]->getmenu_links($this->getAttribute($context["item"], "below", array()), (isset($context["attributes"]) ? $context["attributes"] : null), ((isset($context["menu_level"]) ? $context["menu_level"] : null) + 1))));
                        echo "
        ";
                    }
                    // line 52
                    echo "      </li>
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 54
                echo "    </ul>
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
        return "themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/navigation/menu--main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 54,  127 => 52,  121 => 50,  119 => 49,  115 => 48,  110 => 47,  108 => 44,  107 => 43,  106 => 42,  105 => 40,  103 => 39,  98 => 38,  95 => 37,  91 => 35,  89 => 34,  86 => 33,  82 => 31,  79 => 30,  76 => 29,  73 => 28,  59 => 27,  51 => 24,  48 => 23,  45 => 18,  43 => 17,);
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
/* <div class="menu-centered">*/
/*   {{ menus.menu_links(items, attributes, 0) }}*/
/* </div>*/
/* */
/* {% macro menu_links(items, attributes, menu_level) %}*/
/*   {% import _self as menus %}*/
/*   {% if items %}*/
/*     {% if menu_level == 0 %}*/
/*       <ul class="dropdown menu" data-dropdown-menu>*/
/*     {% else %}*/
/*       <ul class="menu">*/
/*         {% if menu_level == 1 or menu_level == 2 %}*/
/*           <li class="menu-arrow"></li>*/
/*         {% endif %}*/
/*     {% endif %}*/
/*     {% for item in items %}*/
/*       {%*/
/*         set classes = [*/
/*           'menu-item',*/
/*           item.is_expanded ? 'menu-item--expanded',*/
/*           item.is_collapsed ? 'menu-item--collapsed',*/
/*           item.in_active_trail ? 'menu-item--active-trail',*/
/*         ]*/
/*       %}*/
/*       <li{{ item.attributes.addClass(classes) }}>*/
/*         {{ link(item.title, item.url) }}*/
/*         {% if item.below %}*/
/*           {{ menus.menu_links(item.below, attributes, menu_level + 1) }}*/
/*         {% endif %}*/
/*       </li>*/
/*     {% endfor %}*/
/*     </ul>*/
/*   {% endif %}*/
/* {% endmacro %}*/
