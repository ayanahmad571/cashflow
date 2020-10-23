<?php

/* table/search/column_comparison_operators.twig */
class __TwigTemplate_e0695fed51ee00d348a273a040e65e634fc741f9057137384fdcd883b5b1aa7e extends Twig_Template
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
        // line 1
        echo "<select id=\"ColumnOperator";
        echo twig_escape_filter($this->env, (isset($context["search_index"]) ? $context["search_index"] : null), "html", null, true);
        echo "\" name=\"criteriaColumnOperators[";
        echo twig_escape_filter($this->env, (isset($context["search_index"]) ? $context["search_index"] : null), "html", null, true);
        echo "]\">
    ";
        // line 2
        echo (isset($context["type_operators"]) ? $context["type_operators"] : null);
        echo "
</select>
";
    }

    public function getTemplateName()
    {
        return "table/search/column_comparison_operators.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/search/column_comparison_operators.twig", "D:\\wamp64\\www\\pma\\templates\\table\\search\\column_comparison_operators.twig");
    }
}
