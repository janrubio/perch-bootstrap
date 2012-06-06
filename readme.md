# Perch Bootstrap
A very simple framework for building websites using [Perch](http://grabaperch.com) based on my [website bootstrap](https://github.com/mrappleton/website-bootstrap). Although I use this for Perch there's no reason it can't be used for any other PHP application.

## Setup
1. Clone this repo.
2. Go [buy a perch license](https://grabaperch.com/buy) and copy the Perch application files to repo/perch.
3. Follow the Perch [installation instructions](http://support.grabaperch.com/index.php?pg=kb.page&id=3).

## Features

* Use haml and sass/less
* [Semantic grid system](http://semantic.gs/)

### How the routing works with haml

By default, if the file doesn't exist on the server ``` routes.php ``` will try to find the corresponding haml file to render.
For example, ``` /news ``` will render ``` /news.haml ``` and ``` /products/electronics ``` will render ``` /products/electronics.haml ```.

#### Query Strings

Query strings are also supported. Given a request ``` /news?title=Hello%20World ```, in ``` /news.haml ``` we can write ``` .title= $_GET['title'] ```
which outputs:

```
<div class="title">
  <?php echo $_GET['title']; ?>
</div>
```

#### Query Strings in the URL

If the haml file is not found, ``` routes.php ``` will attempt to find a haml file matching the path before it.
For example, ``` /news/Hello%20World ``` when ``` /news/Hello%20World.haml ``` doesn't exist, it will try to render ``` /news.haml ```.
If ``` /news.haml ``` exists, ``` $URI_KEY ``` is set to "Hello World". This allows us to have cleaner urls without needing to use query strings.

So in ``` /news.haml ``` we can write ``` .title= $URI_KEY ``` which outputs

```
<div class="title">
  <?php echo $URI_KEY; ?>
</div>
```

The one caveat is that it only looks one level deep and does not keep searching until a haml file is found.

## License
There is none! Do what you like - use it edit it, distribute it as your own (this excludes the parts which are not mine, e.g. Andy Clarke's ie6.css which are subject to their own licenses).