#Laravel 5 - Validação em Português

Essa é uma biblioteca com algumas validações brasileiras.

[![Build Status](https://travis-ci.org/LaravelLegends/pt-br-validator.svg?branch=master)](https://travis-ci.org/LaravelLegends/pt-br-validator)

#Instalação

No arquivo `composer.json`, adicione:

```json
{
	"laravellegends/pt-br-validator" : "5.1.*"
}
```

Rode o comando `composer update --no-scripts`.

Após a instalação, adicione no arquivo `config/app.php` a seguinte linha:

```php

LaravelLegends\PtBrValidator\ValidatorProvider::class

```

Para utilizar a validação agora, basta fazer o procedimento padrão do `Laravel`.

A diferença é que agora, você terá os seguintes métodos de validação:

* celular - Valida um celular através do formato 99999-9999 ou 9999-9999

* celular_com_ddd -  Valida um celular através do formato (99)99999-9999 ou (99)9999-9999

* cnpj - Valida se o CNPJ é valido. Para testar, basta utilizar o site http://www.geradorcnpj.com/

* cpf - Valida se o cpf é valido. Para testar, basta utilizar o site http://geradordecpf.
org

* data - Valida se a data está no formato 31/12/1969

* formato_cnpj - Valida se a mascará do CNPJ é válida

* formato_cpf - Valida se a mascará do cpf está certo. 999.999.999-99

* telefone - Valida um telefone através do formato 9999-9999

* telefone_com_ddd - Valida um telefone através do formato (99)9999-9999


Então, podemos usar um simples teste:


```php
$validator = Validator::make(
	['telefone' => '(77)9999-3333'],
	['telefone' => 'required|telefone_com_ddd']
);

dd($validator->fails());

```


Já existe nessa biblioteca algumas mensagens padrão para as validações de cada um dos items citados acima. 

Para modificar isso, basta adicionar ao terceiro parâmetro de `Validator::make` um array, contendo o índice com o nome da validação e o valor com a mensagem desejada.


Exemplo:


```php
Validator::make($valor, $regras, ['celular_com_ddd' => 'O campo :attribute não é um celular'])
```




# The Mask

A lightweight (2KB gzipped) and dependency free mask input created specific for Vue.js

## [Docs and Demo](https://vuejs-tips.github.io/vue-the-mask)

### [JsFiddle](https://jsfiddle.net/neves/r8cL3msn/1/)

![The Mask Heart](https://raw.githubusercontent.com/vuejs-tips/vue-the-mask/master/img/the-mask-heart.gif)

## Install

```
yarn add vue-the-mask
or
npm i -S vue-the-mask
```

## Usage (two flavors)

### Global

```javascript
import VueTheMask from 'vue-the-mask'
Vue.use(VueTheMask)
```

### Local (inside the component)

```javascript
import TheMask from 'vue-the-mask'
export default {
  components: {TheMask}
}
```

## Tokens

```javascript
'#': {pattern: /\d/},
'X': {pattern: /[0-9a-zA-Z]/},
'S': {pattern: /[a-zA-Z]/},
'A': {pattern: /[a-zA-Z]/, transform: v => v.toLocaleUpperCase()},
'a': {pattern: /[a-zA-Z]/, transform: v => v.toLocaleLowerCase()},
'!': {escape: true}
```

![The Mask Money](https://raw.githubusercontent.com/vuejs-tips/vue-the-mask/master/img/the-mask-hammer.gif)

## Properties

| Property    | Required | Type                    | Default | Description                                |
|-------------|----------|-------------------------|---------|--------------------------------------------|
| value       | false    | String                  |         | Input value or v-model                     |
| mask        | **true** | String, Function, Array |         | Mask pattern                               |
| masked      | false    | Boolean                 | false   | emit value with mask chars, default is raw |
| placeholder | false    | String                  |         | Same as html input                         |
| type        | false    | String                  | 'text'  | Input type (email, tel, number, ...)       |
| tokens      | false    | Object                  | [tokens](#tokens) | Custom tokens for mask           |

## What about money?

We understand that money format is a totally different domain, which needs another specific component. Stay tunned.

![The Mask Money](https://raw.githubusercontent.com/vuejs-tips/vue-the-mask/master/img/the-mask-money.gif)

## Other Solutions

1. ![https://github.com/nosir/cleave.js](https://img.shields.io/github/stars/nosir/cleave.js.svg?style=social&label=Star) https://github.com/nosir/cleave.js
1. ![https://github.com/text-mask/text-mask](https://img.shields.io/github/stars/text-mask/text-mask.svg?style=social&label=Star) https://github.com/text-mask/text-mask
1. ![https://github.com/igorescobar/jQuery-Mask-Plugin](https://img.shields.io/github/stars/igorescobar/jQuery-Mask-Plugin.svg?style=social&label=Star) https://github.com/igorescobar/jQuery-Mask-Plugin
1. ![https://github.com/fernandofleury/vanilla-masker](https://img.shields.io/github/stars/fernandofleury/vanilla-masker.svg?style=social&label=Star) https://github.com/fernandofleury/vanilla-masker
1. ![https://github.com/angular-ui/ui-mask](https://img.shields.io/github/stars/angular-ui/ui-mask.svg?style=social&label=Star) https://github.com/angular-ui/ui-mask
1. ![https://github.com/insin/inputmask-core](https://img.shields.io/github/stars/insin/inputmask-core.svg?style=social&label=Star) https://github.com/insin/inputmask-core
1. ![https://github.com/niksmr/vue-masked-input](https://img.shields.io/github/stars/niksmr/vue-masked-input.svg?style=social&label=Star) https://github.com/niksmr/vue-masked-input
1. ![https://github.com/probil/v-mask](https://img.shields.io/github/stars/probil/v-mask.svg?style=social&label=Star) https://github.com/probil/v-mask
1. ![https://github.com/moip/awesome-mask](https://img.shields.io/github/stars/moip/awesome-mask.svg?style=social&label=Star) https://github.com/moip/awesome-mask
1. ![https://github.com/the-darc/string-mask](https://img.shields.io/github/stars/the-darc/string-mask.svg?style=social&label=Star) https://github.com/the-darc/string-mask
1. ![https://github.com/romulobrasil/PureMask.js](https://img.shields.io/github/stars/romulobrasil/PureMask.js.svg?style=social&label=Star) https://github.com/romulobrasil/PureMask.js
1. ![https://github.com/devindex/vue-mask](https://img.shields.io/github/stars/devindex/vue-mask.svg?style=social&label=Star) https://github.com/devindex/vue-mask

## Currency

1. ![https://github.com/plentz/jquery-maskmoney](https://img.shields.io/github/stars/plentz/jquery-maskmoney.svg?style=social&label=Star) https://github.com/plentz/jquery-maskmoney
1. ![https://github.com/flaviosilveira/Jquery-Price-Format](https://img.shields.io/github/stars/flaviosilveira/Jquery-Price-Format.svg?style=social&label=Star) https://github.com/flaviosilveira/Jquery-Price-Format
1. ![https://github.com/kevinongko/vue-numeric](https://img.shields.io/github/stars/kevinongko/vue-numeric.svg?style=social&label=Star) https://github.com/kevinongko/vue-numeric

### [Suggest another one here](https://github.com/vuejs-tips/vue-the-mask/issues/new?title=Library+Suggestion)

## Contribution

You're free to contribute to this project by submitting [issues](https://github.com/vuejs-tips/v-tag-input.svg/issues) and/or [pull requests](https://github.com/vuejs-tips/v-tag-input.svg/pulls). This project is test-driven, so keep in mind that every change and new feature should be covered by tests. Your name will be added to the hall of fame ;)

![The Mask Wolf](https://raw.githubusercontent.com/vuejs-tips/vue-the-mask/master/img/the-mask-wolf.gif)

## License

This project is licensed under [MIT License](http://en.wikipedia.org/wiki/MIT_License)