<?php

/* themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/navigation/menu--secondary.html.twig */
class __TwigTemplate_f9064550228cebdac41f3d7acae9bbc2ccf6833fc54eafbf5d3d4c8c0747328f extends Twig_Template
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
        $tags = array("import" => 21, "macro" => 29, "if" => 31, "for" => 33, "set" => 36);
        $filters = array("split" => 36, "e" => 37);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('import', 'macro', 'if', 'for', 'set'),
                array('split', 'e'),
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

        // line 21
        $context["menus"] = $this;
        // line 22
        echo "
";
        // line 27
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["menus"]->getmenu_links((isset($context["items"]) ? $context["items"] : null), (isset($context["attributes"]) ? $context["attributes"] : null), 0)));
        echo "

";
    }

    // line 29
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
            // line 30
            echo "  ";
            $context["menus"] = $this;
            // line 31
            echo "  ";
            if ((isset($context["items"]) ? $context["items"] : null)) {
                // line 32
                echo "    <ul class=\"menu expanded text-center\">
    ";
                // line 33
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 34
                    echo "      <li";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "attributes", array()), "html", null, true));
                    echo ">
        ";
                    // line 35
                    if (twig_in_filter("|", $this->getAttribute($context["item"], "title", array()))) {
                        // line 36
                        echo "          ";
                        $context["title"] = twig_split_filter($this->env, $this->getAttribute($context["item"], "title", array()), "|");
                        echo " 
          ";
                        // line 37
                        if (twig_in_filter("#", $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "url", array())))) {
                            // line 38
                            echo "            <a data-scroll href=\"";
                            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true));
                            echo "\" class=\"menu-item\"><span class=\"";
                            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["title"]) ? $context["title"] : null), 1, array()), "html", null, true));
                            echo "\" aria-hidden=\"true\"></span>";
                            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["title"]) ? $context["title"] : null), 0, array()), "html", null, true));
                            echo "</a>      
          ";
                        } else {
                            // line 40
                            echo "            <a href=\"";
                            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true));
                            echo "\" class=\"menu-item\"><span class=\"";
                            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["title"]) ? $context["title"] : null), 1, array()), "html", null, true));
                            echo "\" aria-hidden=\"true\"></span>";
                            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["title"]) ? $context["title"] : null), 0, array()), "html", null, true));
                            echo "</a>
          ";
                        }
                        // line 41
                        echo "            
        ";
                    } else {
                        // line 43
                        echo "          ";
                        if (twig_in_filter("#", $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "url", array())))) {
                            // line 44
                            echo "            <a data-scroll href=\"";
                            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true));
                            echo "\" class=\"menu-item\">";
                            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true));
                            echo "</a>      
          ";
                        } else {
                            // line 46
                            echo "            <a href=\"";
                            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true));
                            echo "\" class=\"menu-item\">";
                            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "title", array()), "html", null, true));
                            echo "</a>
          ";
                        }
                        // line 48
                        echo "        ";
                    }
                    echo "     
      </li> 
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 51
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
        return "themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/navigation/menu--secondary.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 51,  139 => 48,  131 => 46,  123 => 44,  120 => 43,  116 => 41,  106 => 40,  96 => 38,  94 => 37,  89 => 36,  87 => 35,  82 => 34,  78 => 33,  75 => 32,  72 => 31,  69 => 30,  55 => 29,  48 => 27,  45 => 22,  43 => 21,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override to display a menu.*/
/*  **/
/*  * Available variables:*/
/*  * - menu_name: The machine name of the menu.*/
/*  * - items: A nested list of menu items. Each menu item contains:*/
/*  *   - attributes: HTML attributes for the menu item.*/
/*  *   - below: The menu item child items.*/
/*  *   - title: The menu link title.*/
/*  *   - url: The menu link url, instance of \Drupal\Core\Url*/
/*  *   - localized_options: Menu link localized options.*/
/*  *   - is_expanded: TRUE if the link has visible children within the current*/
/*  *     menu tree.*/
/*  *   - is_collapsed: TRUE if the link has children within the current menu tree*/
/*  *     that are not currently visible.*/
/*  *   - in_active_trail: TRUE if the link is in the active trail.*/
/*  *//* */
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
/*     <ul class="menu expanded text-center">*/
/*     {% for item in items %}*/
/*       <li{{ item.attributes }}>*/
/*         {% if '|' in item.title %}*/
/*           {% set title = item.title|split('|') %} */
/*           {% if '#' in item.url|e %}*/
/*             <a data-scroll href="{{ item.url }}" class="menu-item"><span class="{{ title.1 }}" aria-hidden="true"></span>{{ title.0 }}</a>      */
/*           {% else %}*/
/*             <a href="{{ item.url }}" class="menu-item"><span class="{{ title.1 }}" aria-hidden="true"></span>{{ title.0 }}</a>*/
/*           {% endif %}            */
/*         {% else %}*/
/*           {% if '#' in item.url|e %}*/
/*             <a data-scroll href="{{ item.url }}" class="menu-item">{{ item.title }}</a>      */
/*           {% else %}*/
/*             <a href="{{ item.url }}" class="menu-item">{{ item.title }}</a>*/
/*           {% endif %}*/
/*         {% endif %}     */
/*       </li> */
/*     {% endfor %}*/
/*     </ul>*/
/*   {% endif %}*/
/* {% endmacro %}*/
/* */
