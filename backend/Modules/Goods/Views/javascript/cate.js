const synth = window.speechSynthesis
const msg = new SpeechSynthesisUtterance()
let voices = []
const voicesDropdown = document.querySelector('[name="voice"]')
const options = document.querySelectorAll('[type="range"], [name="text"]')
const speakButton = document.querySelector('#speak')
const stopButton = document.querySelector('#stop')

msg.text = '支付宝到账，1个亿'
msg.lang = 'zh-CN'

synth.addEventListener('voiceschanged',getSupportVoices)
speakButton.addEventListener('click',throttle(handleSpeak,1000))
stopButton.addEventListener('click',handleStop)
options.forEach(e => e.addEventListener('change',handleChange))

function getSupportVoices() {
    voices = synth.getVoices()
    voices.forEach(e => {
        const option = document.createElement('option')
        option.value = e.lang
        option.text = e.name
        voicesDropdown.appendChild(option)
    })
}
function handleSpeak(e) {
    msg.lang = voicesDropdown.selectedOptions[0].value
    synth.speak(msg)
}
function handleStop(e) {
    synth.cancel(msg)
}
function handleChange(e) {
    msg[this.name] = this.value
}
function throttle(fn,delay) {
    let last = 0
    return function() {
        const now = new Date()
        if(now - last > delay) {
            fn.apply(this,arguments)
            last = now
        }
    }
}