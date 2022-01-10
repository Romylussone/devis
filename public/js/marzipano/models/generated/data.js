var APP_DATA = {
  "scenes": [
    {
      "id": "0-hall",
      "name": "hall",
      "levels": [
        {
          "tileSize": 256,
          "size": 256,
          "fallbackOnly": true
        },
        {
          "tileSize": 512,
          "size": 512
        },
        {
          "tileSize": 512,
          "size": 1024
        },
        {
          "tileSize": 512,
          "size": 2048
        }
      ],
      "faceSize": 1500,
      "initialViewParameters": {
        "yaw": -1.162770499527321,
        "pitch": 0.7691301785537483,
        "fov": 1.3108730938557924
      },
      "linkHotspots": [
        {
          "yaw": -0.8075712303153999,
          "pitch": 0.05825732922237137,
          "rotation": 0,
          "target": "1-voir-le-conseill"
        },
        // {
        //   "yaw": -2.673193792614777,
        //   "pitch": 0.1106043952526381,
        //   "rotation": 0.7853981633974483,
        //   "target": "2-plein-air"
        // } // commentaire de l'image de plein air
      ],
      "infoHotspots": [
        {
          "yaw": -0.802773124444423,
          "pitch": -0.11256973043901652,
          "title": "Bureau du Conseillé",
          "text": "Il vous founira les informations nécéssaire sur les écoles"
        },
        {
          "yaw": -1.795752860081933,
          "pitch": 0.19322900903856777,
          "title": "Hall",
          "text": "Bienvenu dans nos locaux"
        }
      ]
    },
    {
      "id": "1-voir-le-conseill",
      "name": "voir le conseiller",
      "levels": [
        {
          "tileSize": 256,
          "size": 256,
          "fallbackOnly": true
        },
        {
          "tileSize": 512,
          "size": 512
        },
        {
          "tileSize": 512,
          "size": 1024
        }
      ],
      "faceSize": 1000,
      "initialViewParameters": {
        "pitch": 0,
        "yaw": 0,
        "fov": 1.5707963267948966
      },
      "linkHotspots": [
        {
          "yaw": 0.6146957900820045,
          "pitch": 0.11745425743894344,
          "rotation": 5.497787143782138,
          "target": "0-hall"
        }
      ],
      "infoHotspots": []
    },
    // {  // commentaire de l'image de plein air
    //   "id": "2-plein-air",
    //   "name": "plein air",
    //   "levels": [
    //     {
    //       "tileSize": 256,
    //       "size": 256,
    //       "fallbackOnly": true
    //     },
    //     {
    //       "tileSize": 512,
    //       "size": 512
    //     },
    //     {
    //       "tileSize": 512,
    //       "size": 1024
    //     },
    //     {
    //       "tileSize": 512,
    //       "size": 2048
    //     }
    //   ],
    //   "faceSize": 2000,
    //   "initialViewParameters": {
    //     "pitch": 0,
    //     "yaw": 0,
    //     "fov": 1.5707963267948966
    //   },
    //   "linkHotspots": [
    //     {
    //       "yaw": -0.5073706139569456,
    //       "pitch": -0.4368555396544238,
    //       "rotation": 5.497787143782138,
    //       "target": "0-hall"
    //     }
    //   ],
    //   "infoHotspots": []
    // }
  ],
  "name": "ziaraley",
  "settings": {
    "mouseViewMode": "drag",
    "autorotateEnabled": true,
    "fullscreenButton": true,
    "viewControlButtons": true
  }
};
