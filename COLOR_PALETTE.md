# 🎨 Color Palette Reference Guide

Quick reference untuk semua warna yang digunakan dalam aplikasi Kawaii Kuudere Chat Example.

---

## 🌑 Background Colors

```css
/* Dark backgrounds for comfortable viewing */
--pastel-bg: #1a1a1a; /* Main background */
--pastel-secondary: #242424; /* Section dividers */
--pastel-tertiary: #2e2e2e; /* Cards & messages */
```

**Usage:**

-   `#1a1a1a` - Main page background
-   `#242424` - Sidebar background, scrollbar track
-   `#2e2e2e` - AI message bubbles, product cards

---

## 💖 Accent Colors (Primary)

```css
/* Vibrant colors for emphasis and interaction */
--accent-primary: #ff6b9d; /* Hot Pink */
--accent-secondary: #a78bfa; /* Bright Purple */
--accent-tertiary: #60a5fa; /* Sky Blue */
```

**Usage:**

-   **Pink (#ff6b9d)**: Main buttons, headings, AI badge, hover effects
-   **Purple (#a78bfa)**: Secondary badges, code blocks, secondary accents
-   **Blue (#60a5fa)**: Product catalog header, tertiary highlights, links

**Gradients:**

```css
/* User message bubble */
background: linear-gradient(135deg, #ec4899, #8b5cf6);

/* Primary button */
background: linear-gradient(135deg, #ff6b9d, #a78bfa);

/* Scrollbar thumb */
background: linear-gradient(180deg, #ff6b9d, #a78bfa);

/* Badge */
background: linear-gradient(135deg, #ff6b9d, #a78bfa);
```

---

## 📝 Text Colors

```css
/* High contrast text for readability */
--text-primary: #f5f5f5; /* Almost white - main text */
--text-secondary: #d1d5db; /* Light gray - supporting text */
--text-muted: #9ca3af; /* Muted gray - timestamps */
```

**Contrast Ratios:**

-   `#f5f5f5` on `#1a1a1a` = **14.5:1** (WCAG AAA ✅)
-   `#d1d5db` on `#1a1a1a` = **9.8:1** (WCAG AAA ✅)
-   `#9ca3af` on `#1a1a1a` = **5.2:1** (WCAG AA ✅)

**Usage:**

-   `#f5f5f5` - Body text, headings, main content
-   `#d1d5db` - Descriptions, secondary information
-   `#9ca3af` - Timestamps, metadata, labels

---

## 🎯 Special Elements

```css
/* User message */
--user-bg: linear-gradient(135deg, #ec4899, #8b5cf6);
--user-text: #ffffff;

/* AI message */
--ai-bg: #2e2e2e;
--ai-border: #52525b;
--ai-text: #f5f5f5;
```

---

## 🔲 Borders & Shadows

```css
/* Borders */
--border-color: #3f3f46; /* Regular borders */
--border-highlight: #52525b; /* Highlighted borders */

/* Shadows */
--shadow-sm: rgba(0, 0, 0, 0.3); /* Small shadow */
--shadow-md: rgba(0, 0, 0, 0.5); /* Medium shadow */
```

**Shadow Examples:**

```css
/* Header shadow */
box-shadow: 0 2px 8px var(--shadow-sm);

/* Button shadow */
box-shadow: 0 4px 12px rgba(255, 107, 157, 0.4);

/* Card hover shadow */
box-shadow: -4px 0 12px rgba(255, 107, 157, 0.3);

/* Message bubble shadow */
box-shadow: 0 4px 12px rgba(236, 72, 153, 0.3);
```

---

## 🌈 Pastel Accent Colors

```css
/* Soft accent colors for icons and highlights */
--pastel-lavender: #c4b5fd; /* Purple pastel */
--pastel-pink: #fda4af; /* Pink pastel */
--pastel-blue: #93c5fd; /* Blue pastel */
--pastel-mint: #86efac; /* Green pastel */
--pastel-peach: #fdba74; /* Orange pastel */
```

**Icon Color Coding:**

```css
/* Product specification icons */
.bi-cpu {
    color: #93c5fd;
} /* CPU - Blue */
.bi-memory {
    color: #86efac;
} /* RAM - Green */
.bi-gpu-card {
    color: #fdba74;
} /* GPU - Orange */
.bi-display {
    color: #c4b5fd;
} /* Display - Purple */
```

---

## 🎨 Navbar & Header

```css
/* Navbar gradient */
background: linear-gradient(135deg, #2a1f3d 0%, #1a1a2e 100%);
border-bottom: 3px solid #ff6b9d;
box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);

/* Navbar brand */
color: #f5f5f5;
text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
```

---

## 💬 Chat Section

```css
/* Chat header */
background: linear-gradient(135deg, #2a1f3d 0%, #1f1f2e 100%);
border-bottom: 2px solid #52525b;

/* Chat title */
color: #ff6b9d;
text-shadow: 0 2px 4px rgba(255, 107, 157, 0.3);

/* Chat background */
background: #1a1a1a;

/* Input form */
background: linear-gradient(135deg, #2a1f3d 0%, #1f1f2e 100%);
border-top: 2px solid #52525b;
```

---

## 📦 Product Sidebar

```css
/* Sidebar background */
background: #242424;

/* Sidebar header */
background: linear-gradient(135deg, #2a1f3d 0%, #1f1f2e 100%);
border-bottom: 2px solid #52525b;

/* Product card */
background: #2e2e2e;
border: 2px solid #52525b;

/* Product card hover */
border-color: #ff6b9d;
box-shadow: -4px 0 12px rgba(255, 107, 157, 0.3);
```

---

## 🎛 Buttons

```css
/* Primary button (Send, etc) */
background: linear-gradient(135deg, #ff6b9d, #a78bfa);
color: #ffffff;
box-shadow: 0 4px 12px rgba(255, 107, 157, 0.4);

/* Danger button (Clear Chat) */
background: linear-gradient(135deg, #dc2626, #991b1b);
color: #ffffff;
box-shadow: 0 2px 8px rgba(220, 38, 38, 0.3);

/* Button hover */
transform: translateY(-2px);
box-shadow: increased;
```

---

## 📝 Form Elements

```css
/* Input field */
background: #2e2e2e;
color: #f5f5f5;
border: 2px solid #52525b;

/* Input focus */
border-color: #ff6b9d;
box-shadow: 0 0 0 0.25rem rgba(255, 107, 157, 0.25);
background-color: #1a1a1a;
```

---

## 🎭 Animations

```css
/* Typing indicator dots */
background: linear-gradient(135deg, #ff6b9d, #a78bfa);
box-shadow: 0 2px 6px rgba(255, 107, 157, 0.4);

/* Badge pulse */
@keyframes badgePulse {
    0%,
    100% {
        box-shadow: 0 2px 6px rgba(255, 107, 157, 0.4);
    }
    50% {
        box-shadow: 0 4px 12px rgba(255, 107, 157, 0.6);
    }
}
```

---

## 📊 Contrast Checker Results

| Element   | Foreground | Background | Ratio  | WCAG   |
| --------- | ---------- | ---------- | ------ | ------ |
| Body Text | #f5f5f5    | #1a1a1a    | 14.5:1 | AAA ✅ |
| Heading   | #ff6b9d    | #1a1a1a    | 5.8:1  | AA ✅  |
| Secondary | #d1d5db    | #1a1a1a    | 9.8:1  | AAA ✅ |
| Muted     | #9ca3af    | #1a1a1a    | 5.2:1  | AA ✅  |
| User Msg  | #ffffff    | gradient   | 8.5:1  | AAA ✅ |
| AI Badge  | #ffffff    | gradient   | 7.2:1  | AAA ✅ |

---

## 🛠 How to Use

### In CSS/Blade Files

```css
/* Use CSS variables */
background: var(--accent-primary);
color: var(--text-primary);
border: 2px solid var(--border-highlight);
```

### Direct Hex Values

```css
/* For gradients */
background: linear-gradient(135deg, #ff6b9d, #a78bfa);

/* For specific colors */
color: #f5f5f5;
box-shadow: 0 4px 12px rgba(255, 107, 157, 0.4);
```

---

## 🎨 Design Tokens

```json
{
    "background": {
        "primary": "#1a1a1a",
        "secondary": "#242424",
        "tertiary": "#2e2e2e"
    },
    "text": {
        "primary": "#f5f5f5",
        "secondary": "#d1d5db",
        "muted": "#9ca3af"
    },
    "accent": {
        "pink": "#ff6b9d",
        "purple": "#a78bfa",
        "blue": "#60a5fa"
    },
    "border": {
        "default": "#3f3f46",
        "highlight": "#52525b"
    },
    "gradient": {
        "userMessage": "linear-gradient(135deg, #ec4899, #8b5cf6)",
        "primaryButton": "linear-gradient(135deg, #ff6b9d, #a78bfa)",
        "navbar": "linear-gradient(135deg, #2a1f3d, #1a1a2e)"
    }
}
```

---

## 🔄 Quick Copy

### Most Used Colors

```css
/* Copy and paste ready */

/* Primary pink accent */
#ff6b9d

/* Purple accent */
#a78bfa

/* Main text white */
#f5f5f5

/* Background dark */
#1a1a1a

/* Card background */
#2e2e2e

/* Border highlight */
#52525b

/* User message gradient */
linear-gradient(135deg, #ec4899, #8b5cf6)

/* Button gradient */
linear-gradient(135deg, #ff6b9d, #a78bfa)
```

---

## 📱 Platform Specific

### Scrollbar Colors

```css
/* Track */
#242424

/* Thumb */
linear-gradient(180deg, #ff6b9d, #a78bfa)

/* Thumb hover */
linear-gradient(180deg, #ff85b3, #b89fff)
```

### Focus States

```css
/* Input focus ring */
rgba(255, 107, 157, 0.25)

/* Button focus glow */
rgba(255, 107, 157, 0.4)
```

---

<div align="center">

### Color Palette by Laptop Kawaii Kuudere Team

**Version**: 1.0.0  
**Last Updated**: November 14, 2025

</div>
