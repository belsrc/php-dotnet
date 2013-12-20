PHP-dotNet
==========
[![Build Status](https://travis-ci.org/belsrc/PHP-dotNet.png?branch=master)](https://travis-ci.org/belsrc/PHP-dotNet)
[![Latest Stable Version](https://poser.pugx.org/belsrc/PHP-dotNet/v/stable.png)](https://packagist.org/packages/belsrc/PHP-dotNet)

PHP .Net like wrapper classes

```php
    use \PhpDotNet\Collection\ArrayList;
    use \PhpDotNet\Collection\Dictionary;
    require 'vendor/autoload.php';
    
    $list = new ArrayList( array(
        'Alpha',
        'Beta',
        'Gamma',
        'Delta',
        'Epsilon',
        'Zeta',
        'Eta',
        'Theta',
    ) );
    
    echo $list;
    
    // Alpha,Beta,Gamma,Delta,Epsilon,Zeta,Eta,Theta
    
    foreach( $list as $item ) {
        echo "$item</br>";
    }
    
    /*
        Alpha
        Beta
        Gamma
        Delta
        Epsilon
        Zeta
        Eta
        Theta
    */
   
    $dictionary = new Dictionary( array(
        'Alpha'   => 'Omega',
        'Beta'    => 'Psi',
        'Gamma'   => 'Chi',
        'Delta'   => 'Phi',
        'Epsilon' => 'Upsilon',
    ) );
    
    echo $dictionary;
    
    // Alpha=>Omega,Beta=>Psi,Gamma=>Chi,Delta=>Phi,Epsilon=>Upsilon
    
    foreach( $dictionary as $key => $val ) {
        echo "$key -> $val</br>";
    }
    
    /*
        Alpha -> Omega
        Beta -> Psi
        Gamma -> Chi
        Delta -> Phi
        Epsilon -> Upsilon
    */
```

## License ##
PHP-dotNet is released under a BSD 3-Clause License

Copyright &copy; 2012-2013, Bryan Kizer
All rights reserved. 

Redistribution and use in source and binary forms, with or without 
modification, are permitted provided that the following conditions are 
met: 

* Redistributions of source code must retain the above copyright notice, 
  this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice,
  this list of conditions and the following disclaimer in the documentation
  and/or other materials provided with the distribution.
* Neither the name of the Organization nor the names of its contributors 
  may be used to endorse or promote products derived from this software 
  without specific prior written permission. 
  
THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS 
IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED 
TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A 
PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT 
HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, 
SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED 
TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR 
PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF 
LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING 
NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS 
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. 
