

<html></html></htlm>

{% if liste is defined %}
<fieldset>
    
{% for u in files %}
<a style="font-weight:bold;color:red" href="/trol/{{u['id']}">{{u['nom']}}</a>   
</fieldset>
{% endfor %}
{% endif %}
</fieldset>
<html>