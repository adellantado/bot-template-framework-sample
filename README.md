This chatbot deployed to Heroku and live on Telegram: https://t.me/template_framework_bot

You can download and run on your local machine to get acquainted with Bot Template Framework<br>
Don't forget to register webhook with command: `php artisan botman:telegram:register`<br>

Learn more here: https://github.com/adellantado/bot-template-framework

Scenario:

    {
      "name": "Hello World Chatbot",
      "fallback": "This chatbot shows how to use different blocks. So type 'text', 'image', 'menu', 'file', 'audio', 'video', 'list', 'carousel', 'ask', 'location', 'request', 'method', 'extend'",
      "blocks": [
        {
          "name": "Text Example",
          "type": "text",
          "content": "Hello World!",
          "template": "Hi;Hello;What's up;Good day;/start;text"
        },
        {
          "name": "Image Example",
          "type": "image",
          "template": "image;Learn More",
          "content": {
            "url": "https://beedevs.com/images/android-icon-192x192.png",
            "text": "Logo Image",
            "buttons": {
              "https://beedevs.com/": "Visit Website"
            }
          }
        },
        {
          "name": "Menu Example",
          "type": "menu",
          "template": "menu",
          "content": {
            "text": "Menu sample",
            "buttons": [
              {
                "Callback": "Learn More"
              },
              {
                "https://beedevs.com/": "Visit Website"
              }
            ]
          }
        },
        {
          "name": "File Example",
          "type": "file",
          "template": "file",
          "content": {
            "text": "Chatbot Infographic",
            "url": "https://bot-template-framework.herokuapp.com/infographic.pdf"
          }
        },
        {
          "name": "Video Example",
          "type": "video",
          "template": "video",
          "content": {
            "text": "Kids",
            "url": "https://ia902302.us.archive.org/27/items/Pbtestfilemp4videotestmp4/video_test_512kb.mp4"
          }
        },
        {
          "name": "Audio Example",
          "type": "audio",
          "template": "audio",
          "content": {
            "text": "Mozart - Horn concerto 4",
            "url": "https://www.mfiles.co.uk/mp3-downloads/mozart-horn-concerto4-3-rondo.mp3"
          }
        },
        {
          "name": "Location Example",
          "type": "location",
          "content": "{{user.firstName}}, please, share your location by clicking button below",
          "template": "location",
          "result": {
            "save": "{{location}}"
          }
        },
        {
          "name": "Request Example",
          "type": "request",
          "method": "GET",
          "url": "http://api.icndb.com/jokes/random",
          "result": {
            "field": "value.joke",
            "save": "{{joke}}"
          },
          "template": "Tell a joke;Joke;Do you know some jokes?;request",
          "next": "Tell a joke"
        },
        {
          "name": "Tell a joke",
          "type": "text",
          "content": "{{joke}}"
        },
        {
          "name": "List Example",
          "type": "list",
          "content": [
            {
              "url": "http://www.laboiteverte.fr/wp-content/uploads/2010/06/dessin-animaux-crayon-08.jpg",
              "title": "At work",
              "description": "Monkey caught unexpectedly"
            },
            {
              "url": "http://www.laboiteverte.fr/wp-content/uploads/2010/06/dessin-animaux-crayon-06.jpg",
              "title": "My buddy",
              "description": "Buddy bear"
            },
            {
              "url": "http://www.laboiteverte.fr/wp-content/uploads/2010/06/dessin-animaux-crayon-021.jpg",
              "title": "Style and fashion",
              "description": "Lion poses for fashion photography"
            }
          ],
          "template": "list"
        },
        {
          "name": "Carousel Example",
          "type": "carousel",
          "content": [
            {
              "url": "http://www.laboiteverte.fr/wp-content/uploads/2010/06/dessin-animaux-crayon-08.jpg",
              "title": "At work",
              "description": "Monkey caught unexpectedly"
            },
            {
              "url": "http://www.laboiteverte.fr/wp-content/uploads/2010/06/dessin-animaux-crayon-06.jpg",
              "title": "My buddy",
              "description": "Buddy bear"
            },
            {
              "url": "http://www.laboiteverte.fr/wp-content/uploads/2010/06/dessin-animaux-crayon-021.jpg",
              "title": "Style and fashion",
              "description": "Lion poses for fashion photography"
            }
          ],
          "template": "carousel"
        },
        {
          "name": "Ask Example",
          "type": "ask",
          "content": "Please, type your email below. If you put test@test.com email instead the response will be different from usual, this made to show 'if' block in action",
          "template": "ask",
          "validate": "email",
          "result": {
            "save": "{{email}}"
          },
          "next": "If Example"
        },
        {
          "name": "If Example",
          "type": "if",
          "next": [
            ["{{email}}", "==", "test@test.com", "Reply Cool"],
            ["{{email}}", "!=", "test@test.com", "Reply Thanks"]
          ]
        },
        {
          "name": "Reply Cool",
          "type": "text",
          "typing": "1s",
          "content": "Cool! 'If' block works!"
        },
        {
          "name": "Reply Thanks",
          "type": "text",
          "typing": "1s",
          "content": "Thank you! Your email: {{email}}"
        },
        {
          "name": "Method Example",
          "type": "method",
          "template": "method",
          "method": "myMethod"
        },
        {
          "name": "Extend Example",
          "type": "extend",
          "base": "Menu Example",
          "template": "extend",
          "content": {
            "text": "Overridden menu with 'extend' block",
            "buttons": [
              {
                "extend": "Call this menu again"
              }
            ]
          }
        }
      ],
      "drivers": [
        {
          "name": "Telegram",
          "token": "TELEGRAM_TOKEN",
          "config": "true"
        }
      ]
    }