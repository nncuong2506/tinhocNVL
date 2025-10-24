def get_response(text):
    text = text.lower()
    if "size" in text or "cỡ" in text:
        return "Bạn vui lòng cho biết chiều cao (cm) và cân nặng (kg) nhé!"
    elif "chào" in text:
        return "Chào bạn! Tôi là Fashion Bot, tôi có thể giúp gì cho bạn?"
    else:
        return f"Tôi đã nhận được tin nhắn: '{text}'"
