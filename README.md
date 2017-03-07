# NkgFormidabBundle

Form maker administration bundle for Sonata with simple field types and layout.

*Admin built on Sonata Admin bundle. Concept inspired from Caldera Forms (https://calderaforms.com/).*

##Types

* String
* Textarea
* Select
* Checkbox
* Radio

##Options
* hide label
* required
* placeholder
* format : text, date, datetime, local, month, number, search, tel, time, url, week

<br/>
<h3>How to install (alongside Sonata Admin) :</h3>

1 - install bundle via packagist : composer require nkg/formidab-bundle

2 - install dependencies : run *composer update*

3 - install database : run *php app/console doctrine:schema:update --force*

4 - import routes (they are defined in Annotation) in your routing.yml

```
app:
    resource: "@NkgFormidabBundle/Controller/"
    type:     annotation
```

5 - add this entity manager to your config.yml :
```
NkgFormidabBundle: ~
```

<h3>Services classes</h3>

see Nkg\FormidabBundle\Services
