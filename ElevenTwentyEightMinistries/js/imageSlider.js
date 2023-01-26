cssTransition = ->
  body = document.body or document.documentElement
  style = body.style
  vendors = ['Moz', 'Webkit', 'O']
      
  return true if typeof style['transition'] is 'string'
      
  for vendor in vendors
    return true if typeof style[vendor + 'Transition'] is 'string'
  
  return false

queue = false
touch = document.documentElement['ontouchstart'] isnt undefined
images = document.querySelector('.images')
imageWidth = images.firstElementChild.offsetWidth
imageOffset = images.firstElementChild.offsetLeft
timeout = if cssTransition() then [300, 400] else [0, 0]

images.addEventListener (if touch then 'touchend' else 'click'), (event) ->
  return if queue
  
  queue = true
    
  if ((if touch then event.changedTouches[0].pageX else event.pageX) - imageOffset) > imageWidth / 2
    direction = 'slide-right'
  else
    direction = 'slide-left'
  lastClassList = images.lastElementChild.classList
    
  lastClassList.add direction
  
  setTimeout ->
    lastClassList.remove direction
    lastClassList.add 'back'
    
    setTimeout ->
      images.insertBefore images.lastElementChild, images.firstElementChild
      lastClassList.remove 'back'
      queue = false
    , timeout[0]
  , timeout[1]
, false