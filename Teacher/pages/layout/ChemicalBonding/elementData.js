var elementdata = [
    {
        "name": "Sodium",
        "symbol": "Na",
        "number": 11,
        "weight": 22.989768,
        "radius": 190,
        "type": "Metal",
        "discovered": "1807",
        "bondsWith": ['N','O','F','S','Cl'],
        "electronegativity": 0.93,
        "group": 1
    },
    {
        "name": "Potassium",
        "symbol": "K",
        "number": 19,
        "weight": 39.0983,
        "radius": 243,
        "type": "Metal",
        "discovered": "1807",
        "bondsWith": ['N','O','F','S','Cl'],
        "electronegativity": 0.82,
        "group": 1
    },
    {
        "name": "Magnesium",
        "symbol": "Mg",
        "number": 12,
        "weight": 24.305,
        "radius": 145,
        "type": "Metal",
        "discovered": "1808",
        "bondsWith": ['N','O','F','S','Cl'],
        "electronegativity": 1.31,
        "group": 2
    },
    {
        "name": "Calcium",
        "symbol": "Ca",
        "number": 20,
        "weight": 40.078,
        "radius": 194,
        "type": "Metal",
        "discovered": "Ancient",
        "bondsWith": ['N','O','F','S','Cl'],
        "electronegativity": 1.00,
        "group": 2
    },
    {
        "name": "Aluminum",
        "symbol": "Al",
        "number": 13,
        "weight": 26.981539,
        "radius": 118,
        "type": "Metal",
        "discovered": "Ancient",
        "bondsWith": ['N','O','F','S','Cl'],
        "electronegativity": 1.61,
        "group": 3
    },
    {
        "name": "Nitrogen",
        "symbol": "N",
        "number": 7,
        "weight": 14.00674,
        "radius": 56,
        "type": "Nonmetal",
        "discovered": "1772",
        "bondsWith": ['N','F','Cl'],
        "electronegativity": 3.04,
        "group": 5
    },
    {
        "name": "Oxygen",
        "symbol": "O",
        "number": 8,
        "weight": 15.9994,
        "radius": 48,
        "type": "Nonmetal",
        "discovered": "1774",
        "bondsWith": ['O','F','Cl'],
        "electronegativity": 3.44,
        "group": 6
    },
    {
        "name": "Fluorine",
        "symbol": "F",
        "number": 9,
        "weight": 18.998403,
        "radius": 42,
        "type": "Nonmetal",
        "discovered": "1670",
        "bondsWith": ['N','O','F','S','Cl'],
        "electronegativity": 3.98,
        "group": 7
    },
    {
        "name": "Sulfur",
        "symbol": "S",
        "number": 16,
        "weight": 32.066,
        "radius": 88,
        "type": "Nonmetal",
        "discovered": "Ancient",
        "bondsWith": ['F','S','Cl'],
        "electronegativity": 2.58,
        "group": 6
    },
    {
        "name": "Chlorine",
        "symbol": "Cl",
        "number": 17,
        "weight": 35.4527,
        "radius": 79,
        "type": "Nonmetal",
        "discovered": "1774",
        "bondsWith": ['N','O','F','S','Cl'],
        "electronegativity": 3.16,
        "group": 7
    }
];

var compoundData = [
    { 
      "name": 'Sodium Nitride',
      "components": ['Na','Na','Na','N'],
      "bond": "ionic",
      "shape": "",
      "symbol": "Na<sub>3</sub>N"
    },
    { 
      "name": 'Sodium Oxide',
      "components": ['Na','Na','O'],
      "bond": "ionic",
      "shape": "",
      "symbol": "Na<sub>2</sub>O"
    },
    { 
      "name": 'Sodium Fluoride',
      "components": ['Na','F'],
      "bond": "ionic",
      "shape": "",
      "symbol": "NaF"
    },
    { 
      "name": 'Sodium Sulfide',
      "components": ['Na','Na','S'],
      "bond": "ionic",
      "shape": "",
      "symbol": "Na<sub>2</sub>S"
    },
    { 
      "name": 'Sodium Chloride',
      "components": ['Na','Cl'],
      "bond": "ionic",
      "shape": "",
      "symbol": "NaCl"
    },
    { 
      "name": 'Potassium Nitride',
      "components": ['K','K','K','N'],
      "bond": "ionic",
      "shape": "",
      "symbol": "K<sub>3</sub>N"
    },
    { 
      "name": 'Potassium Oxide',
      "components": ['K','K','O'],
      "bond": "ionic",
      "shape": "",
      "symbol": "K<sub>2</sub>O"
    },
    { 
      "name": 'Potassium Fluoride',
      "components": ['K','F'],
      "bond": "ionic",
      "shape": "",
      "symbol": "KF"
    },
    { 
      "name": 'Potassium Sulfide',
      "components": ['K','K','S'],
      "bond": "ionic",
      "shape": "",
      "symbol": "K<sub>2</sub>S"
    },
    { 
      "name": 'Potassium Chloride',
      "components": ['K','Cl'],
      "bond": "ionic",
      "shape": "",
      "symbol": "KCl"
    },
    { 
      "name": 'Magnesium Nitride',
      "components": ['Mg','Mg','Mg','N','N'],
      "bond": "ionic",
      "shape": "",
      "symbol": "Mg<sub>3</sub>N<sub>2</sub>"
    },
    { 
      "name": 'Magnesium Oxide',
      "components": ['Mg','O'],
      "bond": "ionic",
      "shape": "",
      "symbol": "MgO"
    },
    { 
      "name": 'Magnesium Fluoride',
      "components": ['Mg','F','F'],
      "bond": "ionic",
      "shape": "",
      "symbol": "MgF<sub>2</sub>"
    },
    { 
      "name": 'Magnesium Sulfide',
      "components": ['Mg','S'],
      "bond": "ionic",
      "shape": "",
      "symbol": "MgS"
    },
    { 
      "name": 'Magnesium Chloride',
      "components": ['Mg','Cl','Cl'],
      "bond": "ionic",
      "shape": "",
      "symbol": "MgCl<sub>2</sub>"
    },
    { 
      "name": 'Calcium Nitride',
      "components": ['Ca','Ca','Ca','N','N'],
      "bond": "ionic",
      "shape": "",
      "symbol": "Ca<sub>3</sub>N<sub>2</sub>"
    },
    { 
      "name": 'Calcium Oxide',
      "components": ['Ca','O'],
      "bond": "ionic",
      "shape": "",
      "symbol": "CaO"
    },
    { 
      "name": 'Calcium Fluoride',
      "components": ['Ca','F','F'],
      "bond": "ionic",
      "shape": "",
      "symbol": "CF<sub>2</sub>"
    },
    { 
      "name": 'Calcium Sulfide',
      "components": ['Ca','S'],
      "bond": "ionic",
      "shape": "",
      "symbol": "CaS"
    },
    { 
      "name": 'Calcium Chloride',
      "components": ['Ca','Cl','Cl'],
      "bond": "ionic",
      "shape": "",
      "symbol": "CaCl<sub>2</sub>"
    },
    { 
      "name": 'Aluminum Nitride',
      "components": ['Al','N'],
      "bond": "ionic",
      "shape": "",
      "symbol": "AlN"
    },
    { 
      "name": 'Aluminum Oxide',
      "components": ['Al','Al','O','O','O'],
      "bond": "ionic",
      "shape": "",
      "symbol": "Al<sub>2</sub>O<sub>3</sub>"
    },
    { 
      "name": 'Aluminum Fluoride',
      "components": ['Al','F','F','F'],
      "bond": "ionic",
      "shape": "",
      "symbol": "AlF<sub>3</sub>"
    },
    { 
      "name": 'Aluminum Sulfide',
      "components": ['Al','Al','S','S','S'],
      "bond": "ionic",
      "shape": "",
      "symbol": "Al<sub>2</sub>S<sub>3</sub>"
    },
    { 
      "name": 'Aluminum Chloride',
      "components": ['Al','Cl','Cl','Cl'],
      "bond": "ionic",
      "shape": "",
      "symbol": "AlCl<sub>3</sub>"
    },
    { 
      "name": 'Nitrogen',
      "components": ['N','N'],
      "bond": "covalent",
      "shape": "linear",
      "symbol": "N<sub>2</sub>"
    },
    { 
      "name": 'Nitrogen Trifluoride',
      "components": ['N','F','F','F'],
      "bond": "covalent",
      "shape": "pyramidal",
      "symbol": "NF<sub>3</sub>"
    },
    { 
      "name": 'Nitrogen Trichloride',
      "components": ['N','Cl','Cl','Cl'],
      "bond": "covalent",
      "shape": "pyramidal",
      "symbol": "NCl<sub>3</sub>"
    },
    { 
      "name": 'Oxygen',
      "components": ['O','O'],
      "bond": "covalent",
      "shape": "linear",
      "symbol": "O<sub>2</sub>"
    },
    { 
      "name": 'Oxygen Difluoride',
      "components": ['O','F','F'],
      "bond": "covalent",
      "shape": "bent",
      "symbol": "OF<sub>2</sub>"
    },
    { 
      "name": 'Oxygen Dichloride',
      "components": ['O','Cl','Cl'],
      "bond": "covalent",
      "shape": "bent",
      "symbol": "OCl<sub>2</sub>"
    },
    { 
      "name": 'Fluorine',
      "components": ['F','F'],
      "bond": "covalent",
      "shape": "linear",
      "symbol": "F<sub>2</sub>"
    },
    { 
      "name": 'Sulfur Difluoride',
      "components": ['S','F','F'],
      "bond": "covalent",
      "shape": "bent",
      "symbol": "SF<sub>2</sub>"
    },
    { 
      "name": 'Chlorine Monofluoride',
      "components": ['Cl','F'],
      "bond": "covalent",
      "shape": "linear",
      "symbol": "ClF"
    },
    { 
      "name": 'Sulfur',
      "components": ['S','S'],
      "bond": "covalent",
      "shape": "linear",
      "symbol": "S<sub>2</sub>"
    },
    { 
      "name": 'Sulfur Dichloride',
      "components": ['S','Cl','Cl'],
      "bond": "covalent",
      "shape": "bent",
      "symbol": "SCl<sub>2</sub>"
    },
    { 
      "name": 'Chlorine',
      "components": ['Cl','Cl'],
      "bond": "covalent",
      "shape": "linear",
      "symbol": "Cl<sub>2</sub>"
    }
];

$(document).ready(function(){

  $('html').fitText(4, {'maxFontSize':16});
  $('.el').fitText(0.25);

  var selectedElements = 0;
  var compoundName, compoundBond, compoundElement1Count, compoundElement2Count, compoundShape, compundSymbol;

  $(window).scroll(function(){
    $('section').removeClass('onscreen')
    $('section:onScreen').addClass('onscreen');
  });


  // bind element clicks to adding
  // them to the comparison boxes
  $('.el.on').on('click', function(){

    var thisSymbol = $(this).children('span').text();

    //make sure it's not an invalid one
    if($(this).hasClass('noton')) { return; }

    //first element selection
    if(selectedElements == 0) {
      $(this).addClass('set-1');
      var bondswith = [];
      // loop through element data to get all the info
      $.each(elementdata, function(x, val) {
        if(thisSymbol == val.symbol) {
          bondswith = elementdata[x].bondsWith;
          selectElementForAtom(elementdata[x], 1);
        }
      });
      //deactivate elements that are not compatible with the first 
      $('.el.on').each(function() {
        thissymbol = $(this).children('span').text();
        if($.inArray(thissymbol, bondswith) === -1) {
            $(this).addClass('noton');
        }
      });
      //partially activate step 2
      $('#section2').addClass('on first');
      selectedElements = 1;
      return;
    }

    //second element selection
    if(selectedElements == 1) {
      $(this).addClass('set-2');    

      // loop through element data to get all the info
      $.each(elementdata, function(x, val) {
        if(thisSymbol == val.symbol) {
          selectElementForAtom(elementdata[x], 2);
        }
      });

      // loop through element data to get current selections
      var firstSymbol = $('.el.on.set-1').children('span').text();    
      var secondSymbol = $('.el.on.set-2').children('span').text();    
      $.each(elementdata, function(x, val) {
        if(firstSymbol == val.symbol) {
          x1 = x;
        }
        if(secondSymbol == val.symbol) {
          x2 = x;
        }      
      });

      //get potential compound info
      var countsMess = {};
      $.each(compoundData, function(x, val) {
        var countFirst = 0, countSecond = 0, countBoth = 0, countNeither = 0;
        for (var i = 0; i < val.components.length; i++) {
          if ((val.components[i] === firstSymbol) && (val.components[i] === secondSymbol)) {
            countBoth++;
          }
          else if (val.components[i] === firstSymbol) {
            countFirst++;
          }
          else if (val.components[i] === secondSymbol) {
            countSecond++;
          }
          else if ((val.components[i] != firstSymbol) && (val.components[i] != secondSymbol)) {
            countNeither++;
          }
        }

        var valName = val.name;
        countsMess[valName] = {
          'name': val.name,
          'bond': val.bond,
          'shape': val.shape,
          'symbol': val.symbol,
          'both': countBoth,
          'first': countFirst,
          'second': countSecond,
          'neither': countNeither
        };

      });

      $.each(countsMess, function(x, c){
        //if they are both the same element
        //it's just one of each, covalent bond
        if((c.both == 2) && (c.neither == 0)) {
          compoundName = c.name; 
          compoundElement1Count = 1;
          compoundElement2Count = 1;
          compoundBond = c.bond;
          compoundShape = c.shape;
          compoundSymbol = c.symbol;
        }
        //other bonds
        else if(((c.first > 0) && (c.second > 0)) && (c.neither == 0)) {
          compoundName = c.name; 
          compoundElement1Count = c.first;
          compoundElement2Count = c.second;
          compoundBond = c.bond;
          compoundSymbol = c.symbol;
          if(c.bond == 'covalent') {
            compoundShape = c.shape;
          }
        }
      });

      $('.el.on').addClass('noton');
      $('#section1').addClass('passed');
      $('#section2').addClass('first');
      //step 2 go
      setTimeout(function(){
        $('#section2').removeClass('first');
        $('#section3').addClass('on');        
        $("html, body").animate({ scrollTop: parseInt($(window).height())+200 }, 500);
      }, 1000);
      selectedElements = 2;

      return;
    }

  });

  $('.ecks').on('click', function() {

    var i = parseInt($('.ecks').index( this )) + 1;
    $('.el.on').removeClass('noton set-1 set-2');
    resetAtom(i);
    $('.column').removeClass('on');
    $('section').removeClass('on first passed');
    $('#section1').addClass('on');
    $('.butn').removeClass('active');
    $('html,body').scrollTop(0);

    $('#guess').addClass('notyet');
    $('#correct1, #correct2, #correctName').html('');
    $('aside.on, #resultBottom').removeClass('on');
    $('.shifted').removeClass('guessed-1 guessed-2 guessed-3 shift-1 shift-2 shifted');
    $('#resultBottom').removeClass('linear pyramidal bent');
    compoundElement1Count = 0;
    compoundElement2Count = 0;
    compoundShape = '';

    if(selectedElements == 1) {
      selectedElements = 0;
    }

    if(selectedElements == 2) {
      var otherx = $('.ecks').not(this);
      var thisSymbol = otherx.siblings('.atombox').find('.atom').attr('data-symbol');
      selectedElements = 0;
      //spoof click on the remaining element to make sure it's first
      $('.el.on:contains('+thisSymbol+')').click();
    }

  });

  //guess type of bond
  $('#guess-ionic, #guess-covalent').on('click', function(){
    $('#guess-ionic, #guess-covalent').removeClass('active');
    var guess = $(this).attr('id').replace('guess-','');
    if(compoundBond == guess) {
      $(this).addClass('active');
      $('#section2, #section3').addClass('passed');
      $('#section4').addClass('on');
      $("html, body").animate({ scrollTop: parseInt($(window).height())+1000 }, 500);
    } else {
      tip($('#section3 .guesses'), 'This answer is incorrect.<br> Please try again.', 3);
    }
  });

  //guess numbers
  $('#guess-1-1, #guess-1-2, #guess-1-3').on('click',function(){
    $('#guess-1-1, #guess-1-2, #guess-1-3').removeClass('active');
    $(this).addClass('active');
    if($('#guess-2 .active').length > 0) { $('#guess').removeClass('notyet'); }
  });

  //guess numbers
  $('#guess-2-1, #guess-2-2, #guess-2-3').on('click',function(){
    $('#guess-2-1, #guess-2-2, #guess-2-3').removeClass('active');
    $(this).addClass('active');
    if($('#guess-1 .active').length > 0) { $('#guess').removeClass('notyet'); }
  });

  //submit answer
  $('#guess').on('click', function(){

    var g1 = $('#guess-1 .active').attr('id').replace('guess-1-','');
    var g2 = $('#guess-2 .active').attr('id').replace('guess-2-','');
    if((g1 == compoundElement1Count) && (g2 == compoundElement2Count)) {
      //correct!
      $('#correctResults aside').removeClass('on');
      $('#section4').addClass('passed');
      $('#correctName').html('<div><strong>'+compoundSymbol+'</strong>'+compoundName+'</div>');
      $('#resultBottom').addClass(compoundShape);
      setTimeout(function(){
        $('#resultBottom').addClass('on');
      },0);
      $('#section5').addClass('on');
      $('#element-1').clone().appendTo('#correct1');
      $('#element-2').clone().appendTo('#correct2');
      $("html, body").animate({ scrollTop: parseInt($(window).height())+9999 }, 1000);
      setTimeout(function(){
        animateResult(compoundName.replace(' ', '-'));
      },1200);

    } else {
      tip($('#section4 .guesses'), 'This answer is incorrect.<br> Please try again.', 6);
    }
    return;

  });

  $('#reset_all').on('click', function(){
    resetAtom(1);
    resetAtom(2);
    $('.el.on').removeClass('noton set-1 set-2');
    $('.column').removeClass('on');
    $('section').removeClass('on first passed');
    $('#section1').addClass('on');
    $('.butn').removeClass('active');
    $('#guess').addClass('notyet');
    $('#correct1, #correct2, #correctName').html('');
    $('aside.on, #resultBottom').removeClass('on');
    $('.shifted').removeClass('guessed-1 guessed-2 guessed-3 shift-1 shift-2 shifted');
    $("html, body").animate({ scrollTop: 0 }, 1000);
    $('#resultBottom').removeClass('linear pyramidal bent');
    selectedElements = 0;
    compoundElement1Count = 0;
    compoundElement2Count = 0;
    compoundShape = '';
  });

  var loopingAnim;

  function animateResult(compoundName,loop) {

    clearTimeout(loopingAnim);

    if (typeof loop === 'undefined') { loop = 0; }

    var e1 = $('#correct1');
    var e2 = $('#correct2');

    $('aside.on').removeClass('on');
    $('.shifted').removeClass('guessed-1 guessed-2 guessed-3 shift-1 shift-2 shifted');

    $.each([e1, e2], function(i, e) {

      i = i+1;
      var guessedNumber = $('#guess-' + i + ' .active').attr('id');
      guessedNumber = guessedNumber.replace('guess-' + i + '-', '');
      var container = $(this).parent();

      container.animate({opacity:0}, 100).removeClass('guessed-1 guessed-2 guessed-3 shift-1 shift-2 shifted');
      if($('#element-'+i+'-a').length > 0) { $('#element-'+i+'-a').remove(); }
      if($('#element-'+i+'-b').length > 0) { $('#element-'+i+'-b').remove(); }

      if(guessedNumber >= 2) {
        e.clone().appendTo(container).attr('id', 'element-'+i+'-a');
        if($('#element-'+i+'-b').length > 0) { $('#element-'+i+'-b').remove(); }
      }
      if(guessedNumber == 3) {
        e.clone().appendTo(container).attr('id', 'element-'+i+'-b');
      }
      setTimeout(function(){
        container.addClass('guessed-' + guessedNumber);
        container.addClass('shift-' + i);
        container.animate({opacity:1}, 250);
      },1);
      setTimeout(function(){
        container.addClass('shifted');
      },1500+loop);
      setTimeout(function(){
        $('#correctResults').addClass('on');
        $('aside.'+compoundName).addClass('on');
      },1600+loop);

    });

    loopingAnim = setTimeout(function(){
      $('aside.on').removeClass('on');
      animateResult(compoundName,3000);
    }, 9000);

  }

  // handle clicks on elements on the periodic table
  function selectElementForAtom(element, use) {
    if(use == 1) {
      $col = $('.atom-cols .column:nth-of-type(1)');
    }
    // otherwise use the second one
    else if(use == 2) {
      $col = $('.atom-cols .column:nth-of-type(2)');
    }

    $col.addClass('on');

    // set all the attributes
    $atom = $col.find('.atom');
    $atom.attr({
      'data-atomic-number': element.number,
      'data-name': element.name,
      'data-symbol': element.symbol,
      'data-weight': element.weight,
      'data-radius': element.radius,
      'data-type': element.type,
      'data-discovered': element.discovered,
      'data-electronegativity': element.electronegativity,
      'data-group': element.group
    });

    $atom.find('.element').removeClass('placeholder').children('span').html(element.symbol);

    $col.find('.name').html(element.name);
    $col.find('.symbol').html(element.symbol + '<span class="ionized"></span>');
    $col.find('.element-type .count').html(element.type);
    $col.find('.electronegativity .count').html(element.electronegativity.toFixed(2));

    $col.find('.smalltitle').removeClass('placeholder');

    // clear the dots
    $atom.find('.dot, .shell').remove();
    //clear any ionization tooltip message
    $col.find('.tooltip').remove();

    //set the name in the how many question
    $('#element-'+use+'-label').text(element.name);

    makedots($atom, element.group);

  }  

  function makedots($element, dots) {
    var dotmarks = Array(parseInt(dots)+1).join('<span class="dot"></span>');
    $atom.find('.element span').append(dotmarks);
  }

  function resetAtom(use) {
    if(use == 1) {
      $col = $('.atom-cols .column:nth-of-type(1)');
    }
    // otherwise use the second one
    else if(use == 2) {
      $col = $('.atom-cols .column:nth-of-type(2)');
    }

    $atom = $col.find('.atom');

    $atom.removeAttr('data-atomic-number');
    $atom.removeAttr('data-name');
    $atom.removeAttr('data-symbol');
    $atom.removeAttr('data-weight');
    $atom.removeAttr('data-radius');
    $atom.removeAttr('data-type');
    $atom.removeAttr('data-discovered');
    $atom.removeAttr('data-electronegativity');
    $atom.removeAttr('data-group');

    $col.find('.name').html('<span class="placeholder">Element</span>');
    $col.find('.symbol').html('<span class="ionized"></span>');

    $atom.find('.element').addClass('placeholder').html('<span></span>');
    $atom.find('.ebox').removeClass('guessed-1 guessed-2 guessed-3 shift-1 shift-2 shift-3');
    $.each([1,2], function(index, i) {
      if($('#element-'+i+'-a').length > 0) { $('#element-'+i+'-a').remove(); }
      if($('#element-'+i+'-b').length > 0) { $('#element-'+i+'-b').remove(); }  
    });

    $col.find('.smalltitle').addClass('placeholder');

  }

  function tip($target, txt, multiplier) {
    $('.wrong-tooltip').remove();
    var $tip = $('<div class="wrong-tooltip"></div>');
    $tip.html(txt);
    $tip.bind('click', function(e) {
      $tip.fadeOut('400', function() {
        $tip.remove();
      });
    });
    $('body').append($tip);

    var tipleft = $target.offset().left + ($target.width() / 2) - ($tip.width() / 2);
    var tiptop = $target.offset().top + $target.innerHeight() - ($target.find('.butn').outerHeight() * multiplier); //$tip.height();
    $tip.css({
      'left': tipleft,
      'top': tiptop,
      'opacity': 0
    });
    $tip.animate({opacity: 1}, 400);
    setTimeout(function(){$('.wrong-tooltip').click();},3000);

  }

});

;(function($) {
  $.expr[":"].onScreen = function(elem) {
    var $window = $(window);
    var viewport_top = $window.scrollTop();
    var viewport_height = $window.height();
    var viewport_bottom = viewport_top + viewport_height;

    viewport_top = viewport_top + (viewport_height * 0.25);
    viewport_bottom = viewport_bottom - (viewport_height * 0.25);

    var $elem = $(elem);
    var top = $elem.offset().top;
    var height = $elem.height();
    var bottom = top + height;

    if(top < (viewport_height * 0.5)) { top = viewport_height * 0.5; }

    return (top >= viewport_top && top < viewport_bottom) ||
           (bottom > viewport_top && bottom <= viewport_bottom) ||
           (height > viewport_height && top <= viewport_top && bottom >= viewport_bottom)
  }
})(jQuery);