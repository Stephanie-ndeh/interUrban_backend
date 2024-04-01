/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode:"class",
  content: ["./**/*.{html,js}"],
  // content: ["./app/**/*.{html,js,php}"],
  theme: {
    extend: {
      keyframes: {
        left_margin_0:{
          '0%':{ 'margin-left':'-500px;'},
          '100%':{ 'margin-left':'0px;'}
        },
        right_margin_0:{
          '0%':{ 'margin-right':'-500px;'},
          '100%':{ 'margin-right':'0px;'}
        },
        zoom_bg:{
          '0%':{ 'background-position':''},
          '100%':{ 'background-position':'center'},
        },
        rotateimg: {
          '0%': { transform: 'rotate(0deg)' },
          '100%': { transform: 'rotate(45deg)' },
        },
      },
      animation: {
        sping: 'sping 3s ease-in-out infinite',
        ping: 'ping 3s ease-in-out infinite',
        bounce: 'bounce 3s ease-in-out infinite',
        rotateimg:'rotateimg 0.5s ease-in-out  forwards',
        left_margin_0:'left_margin_0 0.5s ease-in-out  forwards',
        right_margin_0:'right_margin_0 0.5s ease-in-out  forwards',
        zoom_bg:'zoom_bg 0.5s ease-in-out  forwards'
      },
      colors:{
        primary:{
          100:"#D7E5FF",
          200:"#A4C3FF;",
          300:"#74A4FF;",
          400:"#4383FF;",
          500:"#1565FF;",
          600:"#0057FF;",
        },
        success:{
          100:"#6DFFA7",
          200:"#24FA7A",
          300:"#1BE66C",
          400:"#16D362",
          500:"#16C55C",
          600:"#12AC50",
        },
        info:{
          100:"#DCF0FF",
          200:"#BAE1FF",
          300:"#BAE1FF",
          400:"#59B7FF",
          500:"#2FA5FF",
          600:"#0090FF",
        },
        danger:{
          100:"#FFDBDB",
          200:"#FFAFAF",
          300:"#FF7E7E",
          400:"#FF4D4D",
          500:"#FF2929",
          600:"#FF0000",
        },
        secondary:{
          100:"#F5F5F5",
          200:"#EFEFEF",
          300:"#E4E4E4",
          400:"#CDCDCD",
          500:"#AEAEAF",
          600:"#97999B",
        },
        warning:{
          100:"#FFE3CD",
          200:"#FFE3CD",
          300:"#FFB67D",
          400:"#F0A062",
          500:"#EC914B",
          600:"#F08532",
        },
        dark:{
          100:"#CCCCCC",
          200:"#404450",
          300:"#31333E",
          400:"#1F2128",
          500:"#191A21",
          600:"#141419",
        },
        login:{
          100:"#e5e8f0",
          100:"#f4f2fa",
        },
        dashboard:{
          100:"#F4F9Fc"
        },
        yellow:{
          600:"#FECC3E"
        }
      }
    },
  },
  plugins: [],
}
