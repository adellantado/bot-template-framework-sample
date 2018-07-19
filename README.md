This chatbot deployed to Heroku and live on Telegram: https://t.me/template_framework_bot

You can download and run on your local machine to get acquainted with Bot Template Framework<br>
Learn more here: https://github.com/adellantado/bot-template-framework

Scenario:

    {
      "name": "Hello World Chatbot",
      "fallback": {
        "name": "Hello Block",
        "type": "block"
      },
      "blocks": [
        {
          "name": "Hello Block",
          "type": "text",
          "content": "Hello World!",
          "template": "Hi;Hello;What's up;Good day;/start"
        },
        {
          "name": "Request Phone Number",
          "type": "ask",
          "content": "Please, type your phone belows",
          "template": "phone",
          "result": {
            "save": "{{phone}}"
          },
          "next": "Reply Thanks"
        },
        {
          "name": "Reply Thanks",
          "type": "text",
          "typing": "1s",
          "content": "Thank you!"
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
