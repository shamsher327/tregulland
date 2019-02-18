<?php

/* modules/responsive_menu/theme/responsive-menu-block-toggle.html.twig */
class __TwigTemplate_36485b6a035897ff61d3b45bcb2abd1a156c397fe3ab9136a050dadc81f02da4 extends Twig_Template
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
        $tags = array();
        $filters = array("t" => 2);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array(),
                array('t'),
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

        // line 1
        echo "<a id=\"toggle-icon\" class=\"toggle responsive-menu-toggle-icon\" title=\"Menu\" href=\"#off-canvas\">
  <span class=\"icon\"></span><span class=\"label\">";
        // line 2
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Menu")));
        echo "</span>
</a>";
    }

    public function getTemplateName()
    {
        return "modules/responsive_menu/theme/responsive-menu-block-toggle.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 2,  43 => 1,);
    }
}
/* <a id="toggle-icon" class="toggle responsive-menu-toggle-icon" title="Menu" href="#off-canvas">*/
/*   <span class="icon"></span><span class="label">{{ 'Menu'|t }}</span>*/
/* </a>*/
