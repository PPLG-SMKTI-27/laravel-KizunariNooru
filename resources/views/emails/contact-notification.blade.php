<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', system-ui, sans-serif; background: #0B1220; color: #E2E8F0; }
        .wrapper { max-width: 600px; margin: 40px auto; padding: 0 20px; }
        .card { background: #0F172A; border: 1px solid #334155; border-radius: 24px; overflow: hidden; }
        .header { padding: 40px 40px 32px; background: linear-gradient(135deg, #1e3a8a22, #0F172A); border-bottom: 1px solid #334155; }
        .badge { display: inline-flex; align-items: center; gap: 8px; background: #3B82F610; border: 1px solid #3B82F630; border-radius: 999px; padding: 6px 14px; margin-bottom: 20px; }
        .badge-dot { width: 8px; height: 8px; background: #22C55E; border-radius: 50%; box-shadow: 0 0 10px #22C55E; }
        .badge-text { font-size: 10px; font-weight: 700; color: #3B82F6; text-transform: uppercase; letter-spacing: 0.2em; }
        .logo { font-size: 36px; font-weight: 900; color: #E2E8F0; margin-bottom: 8px; }
        .logo span { color: #3B82F6; }
        .subtitle { font-size: 13px; color: #64748B; }
        .body { padding: 40px; }
        .field { margin-bottom: 24px; }
        .field-label { font-size: 10px; font-weight: 700; color: #64748B; text-transform: uppercase; letter-spacing: 0.3em; margin-bottom: 8px; }
        .field-value { background: #1E293B; border: 1px solid #334155; border-radius: 12px; padding: 14px 18px; font-size: 14px; color: #E2E8F0; line-height: 1.6; }
        .message-value { min-height: 80px; white-space: pre-wrap; }
        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .footer { padding: 24px 40px; background: #0B1220; border-top: 1px solid #334155; text-align: center; }
        .footer-text { font-size: 11px; color: #475569; }
        .divider { height: 1px; background: #334155; margin: 32px 0; }
        .cta { display: inline-block; margin-top: 24px; padding: 14px 32px; background: linear-gradient(135deg, #3B82F6, #0EA5E9); color: white; text-decoration: none; border-radius: 12px; font-weight: 700; font-size: 13px; letter-spacing: 0.05em; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="card">
            <div class="header">
                <div class="badge">
                    <span class="badge-dot"></span>
                    <span class="badge-text">New Inquiry</span>
                </div>
                <div class="logo">FNR<span>.</span></div>
                <p class="subtitle">You have received a new message through your portfolio contact form.</p>
            </div>

            <div class="body">
                <div class="grid">
                    <div class="field">
                        <div class="field-label">Sender Name</div>
                        <div class="field-value">{{ $contactData['name'] }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Email Address</div>
                        <div class="field-value">
                            <a href="mailto:{{ $contactData['email'] }}" style="color:#3B82F6;text-decoration:none;">{{ $contactData['email'] }}</a>
                        </div>
                    </div>
                </div>

                <div class="grid">
                    <div class="field">
                        <div class="field-label">Subject</div>
                        <div class="field-value">{{ $contactData['subject'] ?? '—' }}</div>
                    </div>
                    <div class="field">
                        <div class="field-label">Budget Range</div>
                        <div class="field-value">{{ $contactData['budget'] ?? '—' }}</div>
                    </div>
                </div>

                <div class="field">
                    <div class="field-label">Message</div>
                    <div class="field-value message-value">{{ $contactData['message'] }}</div>
                </div>

                <div class="divider"></div>

                <div style="text-align:center;">
                    <p style="font-size:13px;color:#64748B;margin-bottom:16px;">Reply directly to this person:</p>
                    <a href="mailto:{{ $contactData['email'] }}?subject=Re: {{ urlencode($contactData['subject'] ?? 'Your Inquiry') }}" class="cta">
                        Reply to {{ $contactData['name'] }} →
                    </a>
                </div>
            </div>

            <div class="footer">
                <p class="footer-text">Sent from your portfolio contact form · {{ config('app.url') }}</p>
            </div>
        </div>
    </div>
</body>
</html>
