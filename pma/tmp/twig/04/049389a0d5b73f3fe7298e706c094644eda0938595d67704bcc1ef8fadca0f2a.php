<?php

/* table/search/form_tag.twig */
class __TwigTemplate_48b2ad1026b70212d332a984b2a0fd115469296c8c0953a86333f6ad907604dd extends Twig_Template
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
        echo "<form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, (isset($context["script_name"]) ? $context["script_name"] : null), "html", null, true);
        echo "\" name=\"insertForm\" id=\"";
        echo twig_escape_filter($this->env, (isset($context["form_id"]) ? $context["form_id"] : null), "html", null, true);
        echo "\" class=\"ajax lock-page\">
    ";
        // line 2
        echo PhpMyAdmin\Url::getHiddenInputs((isset($context["db"]) ? $context["db"] : null), (isset($context["table"]) ? $context["table"] : null));
        echo "
    <input type=\"hidden\" name=\"goto\" value=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["goto"]) ? $context["goto"] : null), "html", null, true);
        echo "\" />
    <input type=\"hidden\" name=\"back\" value=\"";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["script_name"]) ? $context["script_name"] : null), "html", null, true);
        echo "\" />
";
    }

    public function getTemplateName()
    {
        return "table/search/form_tag.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 4,  30 => 3,  26 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/search/form_tag.twig", "D:\\wamp64\\www\\pma\\templates\\table\\search\\form_tag.twig");
    }
}
